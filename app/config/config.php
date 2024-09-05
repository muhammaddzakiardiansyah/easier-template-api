<?php

function base_url(string $url = ""): string
{
  return "http://localhost/easier-api/public/" . $url;
}

const DB_HOST = "localhost";
const DB_USER = "root";
const DB_PASS = "";
const DB_NAME = "mvc";