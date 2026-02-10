<?php

return [
    [
        'name' => 'lottery-code',
        'settings' => '{
                "required": false,
                "columnWidth": 0,
                "action": "./",
                "method": "post",
                "roles": {
                    "form-submit": [
                        "guest"
                    ],
                    "form-list": [],
                    "form-edit": [],
                    "form-delete": [],
                    "entries-list": [],
                    "entries-edit": [],
                    "entries-delete": [],
                    "entries-page": [],
                    "entries-resend": []
                },
                "flags": 0,
                "pluginActions": [],
                "framework": "Basic",
                "allowPreset": 0,
                "skipSessionKey": 0,
                "useCookies": 0,
                "partialEntryDays": 14,
                "spamEntryDays": 7,
                "submitText": "Submit",
                "successMessage": "Danke - die Teilnahme wurde erfolgreich registriert.",
                "errorMessage": "One or more errors prevented submission of the form. Please correct and try again.",
                "mobilePx": 0,
                "frBasic_noLoad": [],
                "frBasic_cssURL": "/site/modules/FormBuilder/frameworks/basic/main.css",
                "frBasic_itemContent": [
                    "description",
                    "out",
                    "error",
                    "notes"
                ],
                "honeypot": [],
                "spamFlags": 0,
                "listFields": [],
                "entryDays": 0,
                "emailSubject": "Form Submission",
                "responderSubject": "Auto-Response",
                "saveFlags": 16,
                "spamWords": [],
                "children": {
                    "code": {
                        "type": "Text",
                        "label": "Code*",
                        "required": 1,
                        "columnWidth": 100,
                        "collapsed": "0",
                        "minlength": 0,
                        "maxlength": 2048,
                        "showCount": "0",
                        "size": 0,
                        "requiredAttr": 1
                    },
                    "firstname": {
                        "type": "Text",
                        "label": "Vorname*",
                        "required": false,
                        "columnWidth": 50,
                        "collapsed": "0",
                        "minlength": 0,
                        "maxlength": 2048,
                        "showCount": "0",
                        "size": 0
                    },
                    "lastname": {
                        "type": "Text",
                        "label": "Nachname*",
                        "required": 1,
                        "columnWidth": 50,
                        "collapsed": "0",
                        "minlength": 0,
                        "maxlength": 2048,
                        "showCount": "0",
                        "size": 0,
                        "requiredAttr": 1
                    },
                    "e_mail": {
                        "type": "Email",
                        "label": "E-Mail*",
                        "required": 1,
                        "columnWidth": 0,
                        "collapsed": "0",
                        "minlength": 0,
                        "maxlength": 250,
                        "showCount": "0",
                        "size": 0,
                        "confirm": 1,
                        "allowIDN": "0",
                        "requiredAttr": 1
                    },
                    "event_id": {
                        "type": "Hidden",
                        "label": "event_id",
                        "required": false,
                        "columnWidth": 0,
                        "initValue": ""
                    },
                    "lottery_key": {
                        "type": "Hidden",
                        "label": "key",
                        "required": false,
                        "columnWidth": 0,
                        "initValue": ""
                    }
                }
            }',
    ],
    [
        'name' => 'lottery-normal',
        'settings' => '{
                "required": false,
                "columnWidth": 0,
                "action": "./",
                "method": "post",
                "roles": {
                    "form-submit": [
                        "guest"
                    ],
                    "form-list": [],
                    "form-edit": [],
                    "form-delete": [],
                    "entries-list": [],
                    "entries-edit": [],
                    "entries-delete": [],
                    "entries-page": [],
                    "entries-resend": []
                },
                "flags": 0,
                "pluginActions": [],
                "framework": "Basic",
                "allowPreset": 0,
                "skipSessionKey": 0,
                "useCookies": 0,
                "partialEntryDays": 14,
                "spamEntryDays": 7,
                "submitText": "Daten absenden",
                "successMessage": "Thank you, your form has been submitted.",
                "errorMessage": "One or more errors prevented submission of the form. Please correct and try again.",
                "mobilePx": 0,
                "frBasic_noLoad": [],
                "frBasic_cssURL": "/site/modules/FormBuilder/frameworks/basic/main.css",
                "frBasic_itemContent": [
                    "description",
                    "out",
                    "error",
                    "notes"
                ],
                "honeypot": [],
                "spamFlags": 0,
                "listFields": [],
                "entryDays": 0,
                "emailSubject": "Form Submission",
                "responderSubject": "Auto-Response",
                "saveFlags": 16,
                "spamWords": [],
                "children": {
                    "firstname": {
                        "type": "Text",
                        "label": "Vorname*",
                        "required": false,
                        "columnWidth": 50,
                        "collapsed": "0",
                        "minlength": 0,
                        "maxlength": 2048,
                        "showCount": "0",
                        "size": 0
                    },
                    "lastname": {
                        "type": "Text",
                        "label": "Nachname*",
                        "required": 1,
                        "columnWidth": 50,
                        "collapsed": "0",
                        "minlength": 0,
                        "maxlength": 2048,
                        "showCount": "0",
                        "size": 0,
                        "requiredAttr": 1
                    },
                    "street": {
                        "type": "Text",
                        "label": "Straße*",
                        "required": 1,
                        "columnWidth": 85,
                        "collapsed": "0",
                        "minlength": 0,
                        "maxlength": 2048,
                        "showCount": "0",
                        "size": 0,
                        "requiredAttr": 1
                    },
                    "hnr": {
                        "type": "Text",
                        "label": "Hnr*",
                        "required": 1,
                        "columnWidth": 15,
                        "collapsed": "0",
                        "requiredAttr": 1,
                        "minlength": 0,
                        "maxlength": 2048,
                        "showCount": "0",
                        "size": 0
                    },
                    "zip": {
                        "type": "Text",
                        "label": "PLZ*",
                        "required": false,
                        "columnWidth": 20,
                        "collapsed": "0",
                        "minlength": 0,
                        "maxlength": 2048,
                        "showCount": "0",
                        "size": 0
                    },
                    "city": {
                        "type": "Text",
                        "label": "Ort*",
                        "required": 1,
                        "columnWidth": 80,
                        "collapsed": "0",
                        "requiredAttr": 1,
                        "minlength": 0,
                        "maxlength": 2048,
                        "showCount": "0",
                        "size": 0
                    },
                    "e_mail": {
                        "type": "Email",
                        "label": "E-Mail*",
                        "required": 1,
                        "columnWidth": 0,
                        "collapsed": "0",
                        "minlength": 0,
                        "maxlength": 250,
                        "showCount": "0",
                        "size": 0,
                        "confirm": 1,
                        "allowIDN": "0",
                        "requiredAttr": 1
                    },
                    "phone": {
                        "type": "Text",
                        "label": "Telefon*",
                        "required": false,
                        "columnWidth": 0
                    },
                    "event_id": {
                        "type": "Hidden",
                        "label": "event_id",
                        "required": false,
                        "columnWidth": 0,
                        "initValue": ""
                    },
                    "lottery_key": {
                        "type": "Hidden",
                        "label": "key",
                        "required": false,
                        "columnWidth": 0,
                        "initValue": ""
                    }
                }
            }',
    ],
    [
        'name' => 'lottery-upload',
        'settings' => '{
                "required": false,
                "columnWidth": 0,
                "action": "./",
                "method": "post",
                "roles": {
                    "form-submit": [
                        "guest"
                    ],
                    "form-list": [],
                    "form-edit": [],
                    "form-delete": [],
                    "entries-list": [],
                    "entries-edit": [],
                    "entries-delete": [],
                    "entries-page": [],
                    "entries-resend": []
                },
                "flags": 0,
                "pluginActions": [],
                "framework": "Basic",
                "allowPreset": 0,
                "skipSessionKey": 0,
                "useCookies": 0,
                "partialEntryDays": 14,
                "spamEntryDays": 7,
                "submitText": "Daten absenden",
                "successMessage": "Thank you, your form has been submitted.",
                "errorMessage": "One or more errors prevented submission of the form. Please correct and try again.",
                "mobilePx": 0,
                "frBasic_noLoad": [],
                "frBasic_cssURL": "/site/modules/FormBuilder/frameworks/basic/main.css",
                "frBasic_itemContent": [
                    "description",
                    "out",
                    "error",
                    "notes"
                ],
                "honeypot": [],
                "spamFlags": 0,
                "listFields": [],
                "entryDays": 0,
                "emailSubject": "Form Submission",
                "responderSubject": "Auto-Response",
                "saveFlags": 1,
                "spamWords": [],
                "children": {
                    "receipt": {
                        "type": "FormBuilderFile",
                        "label": "Kassenbon hier hochladen",
                        "required": 1,
                        "columnWidth": 0,
                        "collapsed": "0",
                        "extensions": "gif jpg jpeg png",
                        "maxFileSize": 1048576,
                        "maxFiles": 1,
                        "descRows": 0,
                        "descLength": 2048,
                        "hideInputs": 0,
                        "usePreview": 0,
                        "useHeader": 0
                    },
                    "firstname": {
                        "type": "Text",
                        "label": "Vorname",
                        "required": 1,
                        "columnWidth": 50,
                        "collapsed": "0",
                        "minlength": 0,
                        "maxlength": 2048,
                        "showCount": "0",
                        "size": 0,
                        "requiredAttr": 1
                    },
                    "lastname": {
                        "type": "Text",
                        "label": "Nachname",
                        "required": 1,
                        "columnWidth": 50,
                        "collapsed": "0",
                        "minlength": 0,
                        "maxlength": 2048,
                        "showCount": "0",
                        "size": 0,
                        "requiredAttr": 1
                    },
                    "e_mail": {
                        "type": "Email",
                        "label": "E-Mail",
                        "required": 1,
                        "columnWidth": 0,
                        "collapsed": "0",
                        "minlength": 0,
                        "maxlength": 250,
                        "showCount": "0",
                        "size": 0,
                        "confirm": 1,
                        "allowIDN": "0",
                        "requiredAttr": 1
                    },
                    "event_id": {
                        "type": "Hidden",
                        "label": "event_id",
                        "required": false,
                        "columnWidth": 0
                    },
                    "lottery_key": {
                        "type": "Hidden",
                        "label": "key",
                        "required": false,
                        "columnWidth": 0
                    }
                }
            }',
    ]
];