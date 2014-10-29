<?php
    /**
    * 将论坛中打包的404url的log文件全部转换为xml格式的文件
    * @param $dir 所操作的文件夹
    * @param $file 所操作的文件
    * @param $arr_url 对应的域名
    * @param $escape 是否对url数据中的xml特殊字符进行转义，默认不转义
    * @return  null, 生成result.xml文件
    */
    Class log2xmlClass{
    	private $_dir, $_file, $_urls, $_escape, $_handle, $_count, $_path;

            public $xmlHead = "<?xml version='1.0' encoding='utf-8'?>\n<urlset>\n";
            public $xmlFooter = '</urlset>';

    	public function __construct($dir, $file, $arr_url, $escape=0){
    		$this->_dir = $dir;
    		$this->_file = $file;
    		$this->_urls = $arr_url;
    		$this->_escape = $escape;
                        $this->_count = 1;
    	}

            public function buildXML(){
                        $this->_path = $this->_dir.'/'.$this->_file.'_'.$this->_count.'.xml';
                        //写入xml头部
                        $this->writeFile($this->_path, $this->xmlHead);

                        //读取log文件
                        $contentHandle = @fopen($this->_dir.'/'.$this->_file.'.log', 'r');
                        if($contentHandle){
                            //过滤空行、百度链接和其他非法链接
                            while(!feof($contentHandle) && ($text = fgets($contentHandle, 4096)) !='' ){
                                if(strpos($text, 'http') !== false){
                                    // echo $text."\n";
                                    continue;
                                }

                                //组装内容，转义xml特殊字符
                                $content = "<url>\n";
                                if(strpos($text, '&') || strpos($text, '<')){
                                    $text = str_replace('&','&amp;',$text);
                                    $text = str_replace('<', '&lt;',$text);
                                }
                                $content .= '<loc>'.$this->_urls[$this->_dir].$text.'</loc>'."\n";
                                $extraContent = '<changefrep>dairy</changefrep>'."\n".'<priority>0.8</priority>'."\n".'</url>'."\n";

                                //写入文件
                                $this->writeFile($this->_path, $content.$extraContent);
                            }
                        }
                        fclose($contentHandle);
                        $this->writeFile($this->_path, $this->xmlFooter);


            }

            public function writeFile($path, $content){
                        //xml文件大于9M则新建xml文件存储
                        $maxSize = 1024*1000*9;

                        //清除filesize()函数缓存,重要
                        clearstatcache();

                        if(file_exists($path) && filesize($path) > $maxSize){
                            echo filesize($path)."\n";
                            //如果xml文件大于MAX值，则写入footer，然后新建文件继续写入
                            $this->write($path, $this->xmlFooter);
                            // $handle = @fopen($path, 'a+');
                            // if(@fwrite($handle, $this->xmlFooter) === FALSE){
                            //     echo 'wrong!';exit;
                            // }
                            // fclose($handle);

                            //获取新建文件名
                            $this->_count ++;
                            $this->_path = $this->_dir.'/'.$this->_file.'_'.$this->_count.'.xml';
                            $this->write($this->_path, $this->xmlHead.$content);
                            echo $this->_count."\n";
                            // $this->writeFile($path, $this->xmlHead);
                            echo $path."\n";
                        }else{
                            $this->write($path, $content);
                            // $handle = @fopen($path, 'a+');
                            // if(@fwrite($handle, $content) === FALSE){
                            //     echo 'wrong!';exit;
                            // }
                            // fclose($handle);
                            // echo filesize($path)."\n";
                        }
            }

            public function write($path, $content){
                        $handle = @fopen($path, 'a+');
                        if(@fwrite($handle, $content) === FALSE){
                            echo 'write: wrong!'."\n";
                        }
                        fclose($handle);
            }


    }