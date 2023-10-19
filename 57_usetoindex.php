<?php

    /**
     * conf file -> httpd-xampp.cif
     * :: 복사
     * <FilesMatch "\.php$">
     * SetHandler application/x-httpd-php
     * </FilesMatch>
     * 
     * :: 위치 상관없이 바로 아래 붙여넣기
     * <FilesMatch "\.html$">
     * SetHandler application/x-httpd-php
     * </FilesMatch>
     * 
     * 수정했으면 Apache 재기동
     */