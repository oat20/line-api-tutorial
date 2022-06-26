<?php
print json_encode(
    [
        "type" => "text",
        "text" => "สวัสดีชาวโลก " . date("d/m/Y@H:i"),
        "quickReply" => [
            "items" => [
                [
                    "type" => "action",
                    "action" => [
                        "type" => "location",
                        "label" => "Send location"
                    ]
                ],
                [
                    "type" => "action",
                    "action" => [
                        "type" => "message",
                        "label" => "Sushi",
                        "text" => "Sushi"
                    ]
                ]
            ]
        ]
    ]
);
?>