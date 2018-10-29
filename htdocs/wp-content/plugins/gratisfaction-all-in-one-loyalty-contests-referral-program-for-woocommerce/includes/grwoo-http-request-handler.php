<?php

class HttpRequestHandler
{
    const HEADER_JSON = 'application/json';
    const HEADER_FORM_DATA = 'application/x-www-form-urlencoded';
    
    private $_ch = null;
    
    private $_url = '';
    
    private $_headers = array();
    
    private $_post_data = array();
    
    private $_timeout = 10;
    
    private $_get_resp_header = false;
    
    private $_return_transfer = true;
    
    private $_follow = true;
    
    private $_resp = '';
    
    private $_info = '';
    
    private $_error_info = null;
    
    public function setUrl($url)
    {
        $this->_url = $url;
        
        return $this;
    }
    
    public function setHeaders($headers)
    {
        $this->_headers = $headers;
        
        return $this;
    }
    
    public function setTimeout($timeout)
    {
        $this->_timeout = $timeout;
        
        return $this;
    }
    
    public function setReturnTrasnsfer($has_return_transfer)
    {
        $this->_return_transfer = $has_return_transfer;
        
        return $this;
    }
    
    public function setFollowUrl($is_follow)
    {
        $this->_follow = $is_follow;
        
        return $this;
    }
    
    public function setContentTypeAsJSON()
    {
        $this->_headers[] = 'Content-Type: '.self::HEADER_JSON;
        
        return $this;
    }
    
    public function setPostData($data)
    {
        $this->_post_data = $data;
        
        return $this;
    }
    
    public function resetRequest()
    {
        $this->_resp = '';
        $this->_info = '';
        $this->_error_info = null;
        $this->_headers = array();
        
        return $this;
    }
    
    public function exec($url = '')
    {
        try
        {
            if(!empty($url))
                $this->_url = $url;
            
            if(empty($this->_url))
                throw new Exception('URL is empty');
            
            $this->_ch = curl_init($this->_url);
            
            curl_setopt($this->_ch, CURLOPT_HEADER, $this->_get_resp_header);
            curl_setopt($this->_ch, CURLOPT_RETURNTRANSFER, $this->_return_transfer);
            curl_setopt($this->_ch, CURLOPT_FOLLOWLOCATION, $this->_follow);
            curl_setopt($this->_ch, CURLOPT_TIMEOUT, $this->_timeout);
            
            if(!empty($this->_post_data))
            {
                $is_content_type = false;
                
                if(!empty($this->_headers))
                {
                    $matches = preg_grep('/^Content-Type: /', $this->_headers);
                    
                    if(!empty($matches) && is_array($matches))
                        $is_content_type = count($matches) > 0;
                }
                
                if(in_array(self::HEADER_FORM_DATA, $this->_headers) && is_array($this->_post_data))
                    $this->_post_data = http_build_query($this->_post_data);
                
                curl_setopt($this->_ch, CURLOPT_POST, true);
                curl_setopt($this->_ch, CURLOPT_POSTFIELDS, $this->_post_data);
            }
            
            if(!empty($this->_headers))
                curl_setopt($this->_ch, CURLOPT_HTTPHEADER, $this->_headers);
            
            $this->_resp = curl_exec($this->_ch);
            $this->_info = curl_getinfo($this->_ch);
        }
        catch(Exception $e)
        {
            $this->_error_info = $e;
        }
        
        return $this;
    }
    
    public function getResponse()
    {
        return $this->_resp;
    }
    
    public function getRequestInfo()
    {
        return $this->_info;
    }
    
    public function getErrorInfo()
    {
        return $this->_error_info;
    }
}
