<?php

function UpdateMessage($model)
{
    toastr()->success($model . ' has been updated successfully!', 'Success',['timeOut' => 2000]);
}

function FailedMessage($model)
{
    toastr()->error($model . ' failed to update!', 'Fail',['timeOut' => 2000]);
}

function CreateMessage($model)
{
    toastr()->success($model . ' has been created successfully!', 'Success',['timeOut' => 2000]);
}

function DeleteMessage($model)
{
    toastr()->success($model . ' has been deleted successfully!', 'Success',['timeOut' => 2000]);
}

function customErrorMessage($message, $title)
{
    toastr()->error($message, $title,['timeOut' => 2000]);
}

function customSuccessMessage($message, $title)
{
    toastr()->success($message, $title,['timeOut' => 2000]);
}