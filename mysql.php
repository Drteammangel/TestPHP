<?php
function set_mysql_charset($charset)
{
    /* 如果mysql 版本是 4.1+ 以上，需要对字符集进行初始化 */
    if ($this->version > '4.1') {
        if (in_array(strtolower($charset), array('gbk', 'big5', 'utf-8', 'utf8'))) {
            $charset = str_replace('-', '', $charset);
        }
        if ($charset != 'latin1') {
            mysql_query("SET character_set_connection=$charset, character_set_results=$charset, character_set_client=binary", $this->link_id);
        }
    }
}