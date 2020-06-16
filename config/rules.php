<?php

return [
    'discord-id' => ['nullable', 'string'],
    'twitter' => ['nullable', 'string'],
    'title' => ['required_with:subtitle', 'nullable', 'string'],
    'subtitle' => ['nullable', 'string'],
];
