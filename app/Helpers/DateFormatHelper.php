<?php

function formatDate($dateToFormat)
{
    if (!empty($dateToFormat))
        return date('D, M d, Y g:i A', strtotime($dateToFormat));
}