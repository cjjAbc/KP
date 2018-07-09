<?php
require "configs/config.php";
require "configs/constants.php";
require  "core/MyLoad.class.php";
\core\MyLoad::registerAutoLoad();
\core\Application::run();