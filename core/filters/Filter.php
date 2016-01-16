<?php

interface Filter{
    public function do_filter();
    public function attack_log();
    public function is_filtered();
}