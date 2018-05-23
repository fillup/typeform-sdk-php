<?php
return [
    'POST /forms' => [
        'status' => 201,
        'headers' => [],
        'body' => '{
	"id": "JJDINER",
	"title": "This is an example form",
	"theme": {
		"href": "https:\/\/api.typeform.com\/themes\/6lPNE6"
	},
	"workspace": {
		"href": "https:\/\/api.typeform.com\/workspaces\/3329365"
	},
	"settings": {
		"is_public": false,
		"is_trial": true,
		"language": "en",
		"progress_bar": "proportion",
		"show_progress_bar": true,
		"show_typeform_branding": true,
		"meta": {
			"allow_indexing": false
		}
	},
	"welcome_screens": [
		{
			"ref": "e7a1fadafb42bba1",
			"title": "welcome",
			"properties": {
				"show_button": true,
				"button_text": "start"
			}
		}
	],
	"thankyou_screens": [
		{
			"ref": "3e3c",
			"title": "thanks",
			"properties": {
				"show_button": true,
				"share_icons": true,
				"button_mode": "reload",
				"button_text": "again"
			}
		},
		{
			"ref": "default_tys",
			"title": "Thanks for completing this typeform\nNow *create your own* — it\'s free, easy, & beautiful",
			"properties": {
				"show_button": true,
				"share_icons": false,
				"button_mode": "redirect",
				"button_text": "Create a *typeform*",
				"redirect_url": "https:\/\/admin.typeform.com\/signup?utm_campaign=JJDINER&utm_source=typeform.com-3256155-Basic&utm_medium=typeform&utm_content=typeform-thankyoubutton&utm_term=EN"
			},
			"attachment": {
				"type": "image",
				"href": "https:\/\/images.typeform.com\/images\/2dpnUBBkz2VN"
			}
		}
	],
	"fields": [
		{
			"id": "CN71qzjSY2bq",
			"title": "q1",
			"ref": "q1",
			"properties": {
				"description": "question one"
			},
			"validations": {
				"required": true
			},
			"type": "yes_no"
		}
	],
	"_links": {
		"display": "https:\/\/domain.typeform.com\/to\/JJDINER"
	}
}',
    ],

    'GET /forms/JJDINER' => [
        'status' => 200,
        'headers' => [],
        'body' => '{
	"id": "JJDINER",
	"title": "This is an example form",
	"theme": {
		"href": "https:\/\/api.typeform.com\/themes\/6lPNE6"
	},
	"workspace": {
		"href": "https:\/\/api.typeform.com\/workspaces\/3329365"
	},
	"settings": {
		"is_public": false,
		"is_trial": true,
		"language": "en",
		"progress_bar": "proportion",
		"show_progress_bar": true,
		"show_typeform_branding": true,
		"meta": {
			"allow_indexing": false
		}
	},
	"welcome_screens": [
		{
			"ref": "e7a1fadafb42bba1",
			"title": "welcome",
			"properties": {
				"show_button": true,
				"button_text": "start"
			}
		}
	],
	"thankyou_screens": [
		{
			"ref": "3e3c",
			"title": "thanks",
			"properties": {
				"show_button": true,
				"share_icons": true,
				"button_mode": "reload",
				"button_text": "again"
			}
		},
		{
			"ref": "default_tys",
			"title": "Thanks for completing this typeform\nNow *create your own* — it\'s free, easy, & beautiful",
			"properties": {
				"show_button": true,
				"share_icons": false,
				"button_mode": "redirect",
				"button_text": "Create a *typeform*",
				"redirect_url": "https:\/\/admin.typeform.com\/signup?utm_campaign=JJDINER&utm_source=typeform.com-3256155-Basic&utm_medium=typeform&utm_content=typeform-thankyoubutton&utm_term=EN"
			},
			"attachment": {
				"type": "image",
				"href": "https:\/\/images.typeform.com\/images\/2dpnUBBkz2VN"
			}
		}
	],
	"fields": [
		{
			"id": "CN71qzjSY2bq",
			"title": "q1",
			"ref": "q1",
			"properties": {
				"description": "question one"
			},
			"validations": {
				"required": true
			},
			"type": "yes_no"
		}
	],
	"_links": {
		"display": "https:\/\/domain.typeform.com\/to\/JJDINER"
	}
}',
    ],

];