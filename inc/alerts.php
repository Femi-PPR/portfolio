<?php
enum Alert: string
{
    case Success = "alert-success";
    case Warning = "alert-warning";
    case Error = "alert-error";
}

function createAlertFromType(string $type): Alert
{
    switch ($type) {
        case "success":
            return Alert::Success;
        case "warning":
            return Alert::Warning;
        case "error":
            return Alert::Error;
        default:
            throw new Exception("Unkown alert type given.");
    }
}

function dispAlert(string $type, string $message): string
{
    $alert = createAlertFromType($type);
    return '<div class="alert ' . $alert->value . "\">\n"
        . '    ' . $message . "\n"
        . '    <button type="button" class="close" onclick="dismissAlert(event)">×</button>' . "\n"
        . '</div>';
}