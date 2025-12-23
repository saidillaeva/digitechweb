<?php

return [

    'create' => [
        'title' => 'Upload Document',
    ],

    'edit' => [
        'title' => 'Edit Document',
    ],

    'index' => [
        'title' => 'Documents Management',
        'add'   => 'Upload Document',

        'table_title'   => 'Title',
        'table_group'   => 'Group',
        'table_period'  => 'Period',
        'table_file'    => 'File',
        'table_actions' => 'Actions',

        'empty' => 'No documents uploaded yet',
    ],

    'sections' => [
        'titles'       => 'Document Titles',
        'descriptions' => 'Descriptions',
        'metadata'     => 'Document Metadata',
        'file'         => 'Document File',
    ],

    'fields' => [
        'title'          => 'Title',
        'description'    => 'Description',
        'group'          => 'Group',
        'period'         => 'Period',
        'published_at'   => 'Published Date',
        'file'           => 'File',
        'current_file'   => 'Current File',
        'replace_file'   => 'Replace File',
    ],

    'actions' => [
        'upload'     => 'Upload Document',
        'update'     => 'Update Document',
        'view_file'  => 'View File',
        'open'       => 'Open',
    ],

    'placeholders' => [
        'title_ru'       => 'Enter title in Russian',
        'title_en'       => 'Enter title in English',
        'title_kg'       => 'Enter title in Kyrgyz',
        'title_de'       => 'Enter title in German',

        'description_ru' => 'Enter description in Russian',
        'description_en' => 'Enter description in English',
        'description_kg' => 'Enter description in Kyrgyz',
        'description_de' => 'Enter description in German',
    ],
];
