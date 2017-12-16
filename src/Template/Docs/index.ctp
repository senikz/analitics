<!DOCTYPE html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Аналитика</title><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"><style type="text/css">@import url('https://fonts.googleapis.com/css?family=Roboto:400,700|Inconsolata|Raleway:200');
.hljs-comment,
.hljs-title {
    color: #8e908c;
}
.hljs-variable,
.hljs-attribute,
.hljs-tag,
.hljs-regexp,
.ruby .hljs-constant,
.xml .hljs-tag .hljs-title,
.xml .hljs-pi,
.xml .hljs-doctype,
.html .hljs-doctype,
.css .hljs-id,
.css .hljs-class,
.css .hljs-pseudo {
    color: #c82829;
}
.hljs-number,
.hljs-preprocessor,
.hljs-pragma,
.hljs-built_in,
.hljs-literal,
.hljs-params,
.hljs-constant {
    color: #f5871f;
}
.ruby .hljs-class .hljs-title,
.css .hljs-rules .hljs-attribute {
    color: #eab700;
}
.hljs-string,
.hljs-value,
.hljs-inheritance,
.hljs-header,
.ruby .hljs-symbol,
.xml .hljs-cdata {
    color: #718c00;
}
.css .hljs-hexcolor {
    color: #3e999f;
}
.hljs-function,
.python .hljs-decorator,
.python .hljs-title,
.ruby .hljs-function .hljs-title,
.ruby .hljs-title .hljs-keyword,
.perl .hljs-sub,
.javascript .hljs-title,
.coffeescript .hljs-title {
    color: #4271ae;
}
.hljs-keyword,
.javascript .hljs-function {
    color: #8959a8;
}
.hljs {
    display: block;
    background: white;
    color: #4d4d4c;
    padding: 0.5em;
}
.coffeescript .javascript,
.javascript .xml,
.tex .hljs-formula,
.xml .javascript,
.xml .vbscript,
.xml .css,
.xml .hljs-cdata {
    opacity: 0.5;
}
/* Highlight.js Theme Tomorrow Night */
.right .hljs-comment {
    color: #969896;
}
.right .css .hljs-class,
.right .css .hljs-id,
.right .css .hljs-pseudo,
.right .hljs-attribute,
.right .hljs-regexp,
.right .hljs-tag,
.right .hljs-variable,
.right .html .hljs-doctype,
.right .ruby .hljs-constant,
.right .xml .hljs-doctype,
.right .xml .hljs-pi,
.right .xml .hljs-tag .hljs-title {
    color: #c66;
}
.right .hljs-built_in,
.right .hljs-constant,
.right .hljs-literal,
.right .hljs-number,
.right .hljs-params,
.right .hljs-pragma,
.right .hljs-preprocessor {
    color: #de935f;
}
.right .css .hljs-rule .hljs-attribute,
.right .ruby .hljs-class .hljs-title {
    color: #f0c674;
}
.right .hljs-header,
.right .hljs-inheritance,
.right .hljs-name,
.right .hljs-string,
.right .hljs-value,
.right .ruby .hljs-symbol,
.right .xml .hljs-cdata {
    color: #b5bd68;
}
.right .css .hljs-hexcolor,
.right .hljs-title {
    color: #8abeb7;
}
.right .coffeescript .hljs-title,
.right .hljs-function,
.right .javascript .hljs-title,
.right .perl .hljs-sub,
.right .python .hljs-decorator,
.right .python .hljs-title,
.right .ruby .hljs-function .hljs-title,
.right .ruby .hljs-title .hljs-keyword {
    color: #81a2be;
}
.right .hljs-keyword,
.right .javascript .hljs-function {
    color: #b294bb;
}
.right .hljs {
    display: block;
    overflow-x: auto;
    background: #1d1f21;
    color: #c5c8c6;
    padding: .5em;
    -webkit-text-size-adjust: none;
}
.right .coffeescript .javascript,
.right .javascript .xml,
.right .tex .hljs-formula,
.right .xml .css,
.right .xml .hljs-cdata,
.right .xml .javascript,
.right .xml .vbscript {
    opacity: 0.5;
}
/* Element styles */
body {
    color: black;
    background: #f0f1f4;
    font: 400 14px / 1.42 -apple-system,BlinkMacSystemFont,Segoe UI,Helvetica,Arial,sans-serif;
    margin: 0;
}
header {
    border-bottom: 1px solid #f2f2f2;
    margin-bottom: 12px;
}
h1,
h2,
h3,
h4,
h5 {
    color: #2e2e2e;
    margin: 12px 0;
}
h1 .permalink,
h2 .permalink,
h3 .permalink,
h4 .permalink,
h5 .permalink {
    margin-left: 0;
    opacity: 0;
    transition: opacity 0.25s ease;
}
h1:hover .permalink,
h2:hover .permalink,
h3:hover .permalink,
h4:hover .permalink,
h5:hover .permalink {
    opacity: 1;
}
.triple h1 .permalink,
.triple h2 .permalink,
.triple h3 .permalink,
.triple h4 .permalink,
.triple h5 .permalink {
    opacity: 0.15;
}
.triple h1:hover .permalink,
.triple h2:hover .permalink,
.triple h3:hover .permalink,
.triple h4:hover .permalink,
.triple h5:hover .permalink {
    opacity: 0.15;
}
h1 {
    font-size: 36px;
}
h2 {
    font-size: 30px;
}
p {
    margin: 0 0 10px;
}
p.choices {
    line-height: 1.6;
}
a {
    color: #428bca;
    text-decoration: none;
}
li p {
    margin: 0;
}
hr.split {
    border: 0;
    height: 1px;
    width: 100%;
    padding-left: 6px;
    margin: 12px auto;
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0) 20%, rgba(0, 0, 0, 0.2) 51.4%, rgba(255, 255, 255, 0.2) 51.4%, rgba(255, 255, 255, 0) 80%);
}
dl dt {
    float: left;
    width: 130px;
    clear: left;
    text-align: right;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    font-weight: 700;
}
dl dd {
    margin-left: 150px;
}
blockquote {
    color: rgba(0, 0, 0, 0.5);
    font-size: 15.5px;
    padding: 10px 20px;
    margin: 12px 0;
    border-left: 5px solid #e8e8e8;
}
blockquote p:last-child {
    margin-bottom: 0;
}
pre {
    background-color: #ffffff;
    padding: 12px;
    overflow: auto;
    margin: 0;
}
pre code {
    color: black;
    background-color: transparent;
    padding: 0;
    border: none;
}
code {
    color: #444;
    background-color: #f5f5f5;
    font: 'Inconsolata', monospace;
    padding: 1px 4px;
    border: 1px solid #cfcfcf;
    border-radius: 3px;
}
ol,
ul {
    padding-left: 2em;
}
table {
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 12px;
}
table tr {

}
table tr:first-child {

}
table td {
    border: none;
    padding: 12px 12px 0;
    vertical-align: top;
}
table td.attribute-status {
    text-align: right;
    width: 50px;
}
table td.attribute-status span {
    display: inline-block;
    width: 6px;
    height: 6px;
    background: none;
    border: 2px solid #ccc;
    border-radius: 5px;
    line-height: 8px;
}
table td.attribute-status span.required {
    background: #ccc;
}
table .attribute-type {
    display: inline-block;
    padding: 0px 12px 2px 12px;
    background: #d0d0d0;
    border-radius: 13px;
    color: #fff;
    font-size: 11px;
    margin: 0 0 3px;
}
.text-muted {
    opacity: 0.5;
}
.note,
.warning {
    padding: 0.3em 1em;
    margin: 1em 0;
    border-radius: 2px;
    font-size: 90%;
}
.note h1,
.warning h1,
.note h2,
.warning h2,
.note h3,
.warning h3,
.note h4,
.warning h4,
.note h5,
.warning h5,
.note h6,
.warning h6 {
    font-size: 135%;
    font-weight: 500;
}
.note p,
.warning p {
    margin: 0.5em 0;
}
.note {
    color: black;
    background-color: #f0f6fb;
    border-left: 4px solid #428bca;
}
.note h1,
.note h2,
.note h3,
.note h4,
.note h5,
.note h6 {
    color: #428bca;
}
.warning {
    color: black;
    background-color: #fbf1f0;
    border-left: 4px solid #c9302c;
}
.warning h1,
.warning h2,
.warning h3,
.warning h4,
.warning h5,
.warning h6 {
    color: #c9302c;
}
header {
    margin-top: 24px;
}
.menu-actions {
    display: none;
}
nav {
    position: fixed;
    top: 0;
    bottom: 0;
    overflow-y: auto;                
    padding: 28px 18px;
    box-sizing: border-box;
    width: 26%;
}
nav .resource-group {
    padding: 0 0 25px 0;
}
nav .resource-group .heading {

}
nav .resource-group .heading span {
    color: #f2ba31;
    font-weight: bold;
    text-transform: uppercase;
}
nav .resource-group .heading a:hover {
    text-decoration: none;
    background-color: bad-color;
    border-left: 2px solid black;
}
nav ul {
    list-style-type: none;
    padding-left: 0;
}
nav ul ul {
    margin: 0 0 15px 0;
}
nav ul a {
    display: block;
    font-size: 16px;
    color: rgba(0, 0, 0, 0.7);
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    position: relative;
    line-height: 38px;
    padding: 0;
    box-sizing: border-box;
}
nav ul a:hover {
    text-decoration: none;
}
nav ul > li {
    border-bottom: 1px solid #dedede;
}
nav ul > li:first-child {
    margin-top: -12px;
}
nav ul > li:last-child {
    margin-bottom: -12px;
}
nav ul ul a {
    padding-left: 15px;
    border-bottom: 1px solid #e8e9eb;
    font-size: 14px;
    padding: 0 0 0 14px;
}
nav ul ul li {
    margin: 0;
    border: none;
}
nav ul ul li:first-child {
    margin-top: 0;
}
nav ul ul li:last-child a {
    margin-bottom: 0;
    border: none;
}
nav ul ul li:hover a {
    background: #707071;
    color: #fff;
}
nav > div > div > ul > li:first-child > a {
    border-top: none;
}
/* Generic classes */
.preload * {
    transition: none !important;
}
.pull-left {
    float: left;
}
.pull-right {
    float: right;
}
.badge {
    display: block;
    width: 4px;
    height: 100%;
    position: absolute;
    left: 0;
    top: 0;
}
.badge.get {
    color: #154862;
    background-color: #2b95cb;
}
.badge.head {
    color: #154862;
    background-color: #2b95cb;
}
.badge.options {
    color: #154862;
    background-color: #2b95cb;
}
.badge.put {
    color: #f0db70;
    background-color: #edc25f;
}
.badge.patch {
    color: #f0db70;
    background-color: #fcf8e3;
}
.badge.post {
    color: #195819;
    background-color: #36bb36;
}
.badge.delete {
    color: #971313;
    background-color: #e74343;
}
.collapse-button {
    float: right;
}
nav .collapse-button {
    float: left;
    width: 100%;
    position: absolute;
    padding-left: 90%;
    box-sizing: border-box;
}
.collapse-button .close {
    display: none;
    color: #428bca;
    cursor: pointer;
}
.collapse-button .open {
    color: #428bca;
    cursor: pointer;
}
.collapse-button.show .close {
    display: inline;
}
.collapse-button.show .open {
    display: none;
}
.collapse-content {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease-in-out;
}
.container {
    max-width: 940px;
    margin-left: auto;
    margin-right: auto;
}
.container .row .content {
    margin-left: 244px;
    width: 696px;
}
.content .group-heading {
    font-size: 18px;
    color: #f3ba31;
    font-weight: bold;
    text-transform: uppercase;
    margin: 15px 0 26px;
}
.container .row:after {
    content: '';
    display: block;
    clear: both;
}
.container-fluid .row .content {
    margin-left: 26.5%;
    padding-right: 20px;
}
.container-fluid.triple nav {
    width: 16.5%;
    padding-right: 1px;
}
.container-fluid.triple .row .content {
    position: relative;
    margin-left: 16.5%;
    padding-left: 24px;
}
.middle:after,
.middle:before {
    content: '';
    display: table;
}
.middle:after {
    clear: both;
}
.middle {
    box-sizing: border-box;
    width: 51.5%;
    padding-right: 12px;
}
.right {
    box-sizing: border-box;
    float: right;
    width: 48.5%;
    padding-left: 12px;
}
.right a {
    color: #428bca;
}
.right div,
.right h1,
.right h2,
.right h3,
.right h4,
.right h5,
.right p {
    color: white;
}
.right pre {
    background-color: #1d1f21;
    border: 1px solid #1d1f21;
}
.right pre code {
    color: #c5c8c6;
}
.right .description {
    margin-top: 12px;
}
.triple .resource-heading {
    font-size: 125%;
}
.definition {
    margin-top: 12px;
    margin-bottom: 12px;
}
.definition .method {
    font-weight: bold;
}
.definition .method.get {
    color: #2e89b8;
}
.definition .method.head {
    color: #2e89b8;
}
.definition .method.options {
    color: #2e89b8;
}
.definition .method.post {
    color: #2eb82e;
}
.definition .method.put {
    color: #b8a22e;
}
.definition .method.patch {
    color: #b8a22e;
}
.definition .method.delete {
    color: #b82e2e;
}
.definition .uri {
    word-break: break-all;
    word-wrap: break-word;
}
.definition .hostname {
    opacity: 0.5;
}
.example-names {
    background-color: #eee;
    padding: 12px;
    border-radius: 6px;
}
.example-names .tab-button {
    cursor: pointer;
    color: black;
    border: 1px solid #ddd;
    padding: 6px;
    margin-left: 12px;
}
.example-names .tab-button.active {
    background-color: #d5d5d5;
}
.right .example-names {
    background-color: #444;
}
.right .example-names .tab-button {
    color: white;
    border: 1px solid #666;
    border-radius: 6px;
}
.right .example-names .tab-button.active {
    background-color: #5e5e5e;
}
#nav-background {
    position: fixed;
    left: 0;
    top: 0;
    bottom: 0;
    width: 16.5%;
    padding-right: 14.4px;
    background-color: #fbfbfb;
    border-right: 1px solid #f0f0f0;
    z-index: -1;
}
#right-panel-background {
    position: absolute;
    right: -12px;
    top: -12px;
    bottom: -12px;
    width: 48.6%;
    background-color: #333;
    z-index: -1;
}
/* Context-specific and API color classes */
.back-to-top {
    position: fixed;
    z-index: 1;
    bottom: 0;
    right: 24px;
    padding: 4px 8px;
    color: rgba(0, 0, 0, 0.5);
    background-color: #f2f2f2;
    text-decoration: none !important;
    border-top: 1px solid #d9d9d9;
    border-left: 1px solid #d9d9d9;
    border-right: 1px solid #d9d9d9;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}
.resource-group {
    padding: 12px;
}
.resource-group .heading a,
.resource-group h2.group-heading {
    padding: 12px;
    margin: -12px -12px 12px -12px;
    background-color: #f2f2f2;
    border-bottom: 1px solid #d9d9d9;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
}
.triple .content .resource-group {
    padding: 0;
    border: none;
}
.triple .content .resource-group .heading a,
.triple .content .resource-group h2.group-heading {
    margin: 0 0 12px;
    border: 1px solid #d9d9d9;
}
nav .resource-group .collapse-content {
    padding: 0;
}
.action {
    margin-bottom: 40px;
    padding: 18px 25px 0;
    overflow: hidden;
    border: 1px solid rgba(137, 137, 137, 0.16);
    padding-bottom: 20px;
    background: #fff;
}
.action .action-name {
    font-size: 18px;
    position: relative;
    white-space: nowrap;
    line-height: 1;
    text-align: left;
    margin: 10px 0;
    height: 30px;
    font-weight: 400;
    color: #000;
}
.action .action-resource {
    color: #afaeae;
    font-size: 15px;
}
.action .action-dif {
    padding: 0 7px;
    color: #afaeae;
    font-size: 15px;
}
.action .action-title {

}
.action h4.action-heading {
    padding: 0;
    margin: 7px 0 15px;
    border-width: 1px;
    border-style: solid;
    border-radius: 4px;
    height: 40px;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
}
.action h4.action-heading .name {
    float: right;
    font-weight: normal;
}
.action h4.action-heading .method {
    padding: 0;
    margin-right: 12px;
    border-radius: 0;
    line-height: 40px;
    height: 40px;
    display: block;
    width: 64px;
    text-align: center;
    font-size: 16px;
    color: #fff !important;
    float: left;
}
.action h4.action-heading .code {
    height: 40px;
    display: block;
    line-height: 40px;
    font-size: 15px;
    background-color: transparent;
    padding: 0;
    border: none;
    font-family:monospace;
}
.action dl.inner {
    padding-bottom: 2px;
}
.action div.inner {
    margin-bottom: 30px;
}
.action .title {
    margin: 0 0 0px;
    padding: 15px 0 7px 0;
    color: #000;
    font-size: 16px;
    border-bottom: 1px solid #dddcdc;
}
.action .title strong {
    padding: 0 10px 0 0;
    font-weight: 600;
}
.action .title code {
    font-weight: 600;
    font-size: 11px;
    font-family: sans-serif !important;
    display: inline-block;
    position: relative;
    color: #2a962a;
    border: 1px solid #2b965d;
    background: none;
    height: 12px;
    padding: 0px 3px 2px;
    line-height: 16px;
}
.action .title .collapse-button {
    padding: 0 0 0 8px;
    background: #fff;
}
.action .title .collapse-button * {
    color: #666;
}
.action.get h4.action-heading,
.action.get h4.action-heading .code {
    color: #337ab7;
}
.action.get h4.action-heading .method {
    background-color: #337ab7;
}
.action.head h4.action-heading,
.action.head h4.action-heading .code {
    color: #337ab7;
}
.action.head h4.action-heading .method {
    background-color: #337ab7;
}
.action.options h4.action-heading,
.action.options h4.action-heading .code {
    color: #337ab7;
}
.action.options h4.action-heading .method {
    background-color: #337ab7;
}
.action.post h4.action-heading,
.action.post h4.action-heading .code {
    color: #5cb85c;
}
.action.post h4.action-heading .method {
    background-color: #5cb85c;
}
.action.put h4.action-heading,
.action.put h4.action-heading .code {
    color: #ed9c28;
}
.action.put h4.action-heading .method {
    background-color: #ed9c28;
}
.action.patch h4.action-heading,
.action.patch h4.action-heading .code {
    color: #ed9c28;
}
.action.patch h4.action-heading .method {
    background-color: #ed9c28;
}
.action.delete h4.action-heading,
.action.delete h4.action-heading .code {
    color: #d9534f;
}
.action.delete h4.action-heading .method {
    background-color: #d9534f;
}
.tabs.r-tabs {

}
.r-tabs .tabs-menu {
    box-shadow: none!important;
    border: none;
    background: transparent;
    bottom: 0;
    margin: -40px 0 25px 0;
    top: 0;
    float: right;
}
.r-tabs .tabs-menu a {
    color: rgba(0, 0, 0, 0.87);
    margin: 0;
    display: inline-block;
    text-align: center;
    line-height: 40px;
    height: 40px;
    text-transform: uppercase;
    cursor: pointer;
    font-size: 11px;
    padding: 0 10px;
}
.r-tabs .tabs-menu a.active {
    color: rgba(0, 0, 0, 0.95);
    border-top-width: 1px;
    border-color: #D4D4D5;
    font-weight: 700;
    margin-bottom: -1px;
    box-shadow: none;
    border-radius: 0.28571429rem 0.28571429rem 0 0!important;
}
.r-tabs .tab {
    background: #fff;
    padding: 0 10px;
    display: none;
    min-height: 100px;
    box-sizing: border-box;
}
.r-tabs .tab pre {
    width: 100%;
    box-sizing: border-box;
}
r-tabs .tab.active {
    display: block;
}
@media (max-width: 1200px) {
    .container {
        max-width: 840px;
    }
    .container .row .content {
        margin-left: 224px;
        width: 606px;
    }
}
@media (max-width: 992px) {
    .container {
        max-width: 720px;
    }
    .container .row .content {
        margin-left: 194px;
        width: 526px;
    }
}
@media (max-width: 768px) {
    body {
        margin: 38px 0 0 0;
    }
    .menu-actions {
        position: fixed;
        height: 45px;
        width: 100%;
        background: #fff;
        top: 0;
        display: block;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
        z-index: 9000;
    }
    .menu-action {
        float: right;
        display: block;
        height: 100%;
        width: 45px;
        font-size: 16px;
        font-weight: bold;
        padding:11px 15px;
        box-sizing: border-box;
        cursor: pointer;
    }
    nav {
        display: none;
        background: #fff;
        width: 80%;
        border-right: 1px solid #bababa;
        z-index: 10000;
        max-width: 360px;
        box-shadow: 2px 0 8px rgba(0, 0, 0, 0.3);
    }
    nav.show {
        display: block;
    }
    nav ul a {
        font-size: 14px;
        line-height: 32px;
    }
    nav ul ul a {
        font-size: 13px;
        padding: 0 0 0 10px;
    }
    .container {
        width: 95%;
        max-width: none;
    }
    .container .row .content,
    .container-fluid .row .content,
    .container-fluid.triple .row .content {
        margin: auto;
        width: 95%;
        padding:0;
    }
    #nav-background {
        display: none;
    }
    #right-panel-background {
        width: 48.6%;
    }
    .action {
        padding: 5px 10px 0;
    }
    .action .action-resource {
        font-size: 12px;
    }
    .action .action-dif {
        padding: 0 4px;
    }
    .action .action-name {
        font-size: 12px;
        height: 19px;
    }
    .action h4.action-heading .method {
        padding: 0;
        margin-right: 6px;
        line-height: 26px;
        height: 26px;
        width: 42px;
        font-size: 11px;
    }
    .action h4.action-heading {
        padding: 0;
        margin: 0px 0 4px;
        border-radius: 4px;
        height: 26px;
    }
    .action h4.action-heading .code {
        height: 26px;
        line-height: 26px;
        font-size: 12px;
        font-family:monospace;
        overflow-x: auto;
        padding-right: 6px;
    }
    table td.attribute-status {
        width: auto;
    }
    table td {
        padding: 3px 3px 0;
    }
    .action .title {
        padding: 8px 0 4px 0;
        font-size: 13px;
    }
    .r-tabs .tabs-menu {
        margin: -24px 0 10px 0;
    }
    .r-tabs .tabs-menu a {
        line-height: 22px;
        height: 24px;
        font-size: 10px;
        padding: 0 4px;
    }
    .action .div {
        margin: 10px 0 0 0;
    }
}
</style></head><body class="preload"><a href="#top" class="text-muted back-to-top"><i class="fa fa-toggle-up"></i>&nbsp;Back to top</a><div class="menu-actions"><a id="nav-toggle" class="menu-action">☰</a></div><div class="container-fluid"><div class="row"><nav id="navi"><div class="resource-group"><div class="heading"><span>Overview</span></div><div><ul><li><a href="#header-аутентификация">Аутентификация</a></li><li><a href="#header-rest">REST</a></li><li><a href="#header-формат-ответа">Формат ответа</a></li><li><a href="#header-история-изменений">История изменений</a></li></ul></div></div><div class="resource-group"><div class="heading"><span>Reference</span></div><div><ul><li><a href="#настройки"><div class="chevron collapse-button"><i class="open fa fa-angle-down"></i></div><span>Настройки</span></a><div class="collapse-content"><ul><li><a href="#настройки-get"><span class="badge get"></span>Список профилей поисковых систем</a></li></ul></div></li><li><a href="#проекты"><div class="chevron collapse-button"><i class="open fa fa-angle-down"></i></div><span>Проекты</span></a><div class="collapse-content"><ul><li><a href="#проекты-get"><span class="badge get"></span>Список проектов</a></li><li><a href="#проекты-get-1"><span class="badge get"></span>Детали проекта</a></li><li><a href="#проекты-get-2"><span class="badge get"></span>Список сайтов</a></li><li><a href="#проекты-get-3"><span class="badge get"></span>Список кампаний</a></li><li><a href="#проекты-get-4"><span class="badge get"></span>Общая статистика проекта</a></li><li><a href="#проекты-get-5"><span class="badge get"></span>Подробная статистика проекта</a></li><li><a href="#проекты-get-6"><span class="badge get"></span>Список заявок</a></li><li><a href="#проекты-get-7"><span class="badge get"></span>Календарь стоимости заказа</a></li></ul></div></li><li><a href="#сайты"><div class="chevron collapse-button"><i class="open fa fa-angle-down"></i></div><span>Сайты</span></a><div class="collapse-content"><ul><li><a href="#сайты-get"><span class="badge get"></span>Список сайтов</a></li><li><a href="#сайты-post"><span class="badge post"></span>Добавить новый сайт</a></li><li><a href="#сайты-get-1"><span class="badge get"></span>Детали сайта</a></li><li><a href="#сайты-delete"><span class="badge delete"></span>Удалить сайт</a></li><li><a href="#сайты-get-2"><span class="badge get"></span>Список кампаний</a></li><li><a href="#сайты-post-1"><span class="badge post"></span>Добавление заказа</a></li><li><a href="#сайты-post-2"><span class="badge post"></span>Добавление произвольного расхода</a></li><li><a href="#сайты-get-3"><span class="badge get"></span>Общая статистика сайта</a></li><li><a href="#сайты-get-4"><span class="badge get"></span>Подробная статистика сайта</a></li><li><a href="#сайты-put"><span class="badge put"></span>Обновление статистики сайта</a></li><li><a href="#сайты-put-1"><span class="badge put"></span>Обновление UTM меток</a></li></ul></div></li><li><a href="#кампании"><div class="chevron collapse-button"><i class="open fa fa-angle-down"></i></div><span>Кампании</span></a><div class="collapse-content"><ul><li><a href="#кампании-get"><span class="badge get"></span>Список кампаний</a></li><li><a href="#кампании-post"><span class="badge post"></span>Добавить новую кампанию</a></li><li><a href="#кампании-get-1"><span class="badge get"></span>Детали кампании</a></li><li><a href="#кампании-delete"><span class="badge delete"></span>Удалить кампанию</a></li><li><a href="#кампании-get-2"><span class="badge get"></span>Общая статистика кампании</a></li><li><a href="#кампании-get-3"><span class="badge get"></span>Подробная статистика кампании</a></li><li><a href="#кампании-get-4"><span class="badge get"></span>Текущие настройки биддера</a></li><li><a href="#кампании-put"><span class="badge put"></span>Обновить настройки биддера</a></li><li><a href="#кампании-get-5"><span class="badge get"></span>Список ключевых фраз</a></li><li><a href="#кампании-get-6"><span class="badge get"></span>Список групп объявлений</a></li><li><a href="#кампании-get-7"><span class="badge get"></span>Обновить содержимое кампании</a></li></ul></div></li><li><a href="#группы-объявлений"><div class="chevron collapse-button"><i class="open fa fa-angle-down"></i></div><span>Группы объявлений</span></a><div class="collapse-content"><ul><li><a href="#группы-объявлений-get"><span class="badge get"></span>Список групп</a></li><li><a href="#группы-объявлений-get-1"><span class="badge get"></span>Детали группы</a></li><li><a href="#группы-объявлений-get-2"><span class="badge get"></span>Список ключевых фраз</a></li><li><a href="#группы-объявлений-get-3"><span class="badge get"></span>Текущие настройки биддера</a></li><li><a href="#группы-объявлений-put"><span class="badge put"></span>Обновить настройки биддера</a></li><li><a href="#группы-объявлений-get-4"><span class="badge get"></span>Общая статистика группы объявлений</a></li></ul></div></li><li><a href="#ключевые-фразы"><div class="chevron collapse-button"><i class="open fa fa-angle-down"></i></div><span>Ключевые фразы</span></a><div class="collapse-content"><ul><li><a href="#ключевые-фразы-get"><span class="badge get"></span>Детали ключевой фразы</a></li><li><a href="#ключевые-фразы-get-1"><span class="badge get"></span>Поиск фразы</a></li><li><a href="#ключевые-фразы-get-2"><span class="badge get"></span>Текущие настройки биддера</a></li><li><a href="#ключевые-фразы-put"><span class="badge put"></span>Обновить настройки биддера</a></li><li><a href="#ключевые-фразы-get-3"><span class="badge get"></span>Общая статистика ключевой фразы</a></li></ul></div></li><li><a href="#биддер"><div class="chevron collapse-button"><i class="open fa fa-angle-down"></i></div><span>Биддер</span></a><div class="collapse-content"><ul><li><a href="#биддер-get"><span class="badge get"></span>Получить информацию о запуске биддера</a></li><li><a href="#биддер-put"><span class="badge put"></span>Обновить настройки запуска биддера</a></li></ul></div></li><li><a href="#звонки"><div class="chevron collapse-button"><i class="open fa fa-angle-down"></i></div><span>Звонки</span></a><div class="collapse-content"><ul><li><a href="#звонки-get"><span class="badge get"></span>Добавление информации о новом звонке</a></li></ul></div></li></ul></div></div></nav><div class="content"><header><h1 id="top">Аналитика</h1></header><h2 class="group-heading">Overview</h2><div class="hostname"><a href="http://analitics.catkitcms.ru/api">http://analitics.catkitcms.ru/api</a></div><h3 id="header-аутентификация">Аутентификация <a class="permalink" href="#header-аутентификация" aria-hidden="true">¶</a></h3>
<p>Для авторизации приложения используется механизм JWT токенов. При каждом
запросе к API должен передаваться HTTP-заголовок <code>User-Token</code>, содержащий
JWT токен.</p>
<p>Пример запроса к сервису:</p>
<pre><code>curl -H <span class="hljs-string">'User-Token: SOME-KEY'</span> <span class="hljs-string">http:</span><span class="hljs-comment">//analitics.catkitcms.ru/api/</span></code></pre>
<h3 id="header-rest">REST <a class="permalink" href="#header-rest" aria-hidden="true">¶</a></h3>
<ul>
<li>
<p>GET - получение информации</p>
</li>
<li>
<p>POST - создание новой записи</p>
</li>
<li>
<p>PUT - обновление существующей записи</p>
</li>
<li>
<p>DELETE - удаление записи</p>
</li>
</ul>
<h3 id="header-формат-ответа">Формат ответа <a class="permalink" href="#header-формат-ответа" aria-hidden="true">¶</a></h3>
<p>Успешный ответ будет возвращен как JSON-объект с одним из следующих
параметров:</p>
<ul>
<li>
<p><code>data</code>: основные данные, возвращаемые при успешном создании запроса.</p>
</li>
<li>
<p><code>errors</code>: массив возвращаемых ошибок</p>
</li>
</ul>
<p>Объекты <code>data</code> и<code>errors</code> не могут быть возвращены в одном запросе.</p>
<p><strong>Объект ответа</strong></p>
<p>Для одного объекта:</p>
<pre><code class="language-json">{
    request: {
        query: {},
        body: {}
    },
    data: {
        id: 1,
        caption: 'First item'
    }
}</code></pre>
<p>Для списка:</p>
<pre><code class="language-json">{
    request: {
        query: {},
        body: {}
    },
    data: [
        {
            id: 1,
            caption: 'First item'
        }, {
            id: 2,
            caption: 'Second item'
        }
    ]
}</code></pre>
<h3 id="header-история-изменений">История изменений <a class="permalink" href="#header-история-изменений" aria-hidden="true">¶</a></h3>
<p><code>1.4</code></p>
<ul>
<li>Изменены методы получения и установки настроек биддера для <a href="#%D0%BA%D0%B0%D0%BC%D0%BF%D0%B0%D0%BD%D0%B8%D0%B8-get-4">кампаний</a>, <a href="#%D0%B3%D1%80%D1%83%D0%BF%D0%BF%D1%8B-%D0%BE%D0%B1%D1%8A%D1%8F%D0%B2%D0%BB%D0%B5%D0%BD%D0%B8%D0%B9-get-3">групп объявлений</a> и <a href="#%D0%BA%D0%BB%D1%8E%D1%87%D0%B5%D0%B2%D1%8B%D0%B5-%D1%84%D1%80%D0%B0%D0%B7%D1%8B-get-2">ключевых фраз</a>.</li>
</ul>
<p><code>1.3</code></p>
<ul>
<li>Добавлены методы получения статистики для <a href="#%D0%B3%D1%80%D1%83%D0%BF%D0%BF%D1%8B-%D0%BE%D0%B1%D1%8A%D1%8F%D0%B2%D0%BB%D0%B5%D0%BD%D0%B8%D0%B9-get-4">группы объявлений</a> и <a href="#%D0%BA%D0%BB%D1%8E%D1%87%D0%B5%D0%B2%D1%8B%D0%B5-%D1%84%D1%80%D0%B0%D0%B7%D1%8B-get-3">ключевой фразы</a></li>
</ul>
<p><code>1.2</code></p>
<ul>
<li>
<p>Добавлен метод задания <a href="#%D1%81%D0%B0%D0%B9%D1%82%D1%8B-put-1">UTM меток для всех кампаний сайта</a></p>
</li>
<li>
<p>Добавлена возможность сортировки списка сайтов проекта и общего списка сайтов</p>
</li>
<li>
<p>Заявки проекта теперь могут <a href="#%D0%BF%D1%80%D0%BE%D0%B5%D0%BA%D1%82%D1%8B-get-6">отображаться постранично</a></p>
</li>
<li>
<p>Добавлен <a href="#%D0%BF%D1%80%D0%BE%D0%B5%D0%BA%D1%82%D1%8B-get-7">календарь стоимости заказов проекта по датам</a></p>
</li>
<li>
<p>Добавлен <a href="#%D0%BA%D0%B0%D0%BC%D0%BF%D0%B0%D0%BD%D0%B8%D0%B8-get-4">временной таргетинг настроек биддера для кампании</a></p>
</li>
<li>
<p>В <a href="#%D0%BA%D0%B0%D0%BC%D0%BF%D0%B0%D0%BD%D0%B8%D0%B8-get-2">статистику кампании</a> добавлено количество заявок</p>
</li>
<li>
<p>В <a href="#%D0%BA%D0%B0%D0%BC%D0%BF%D0%B0%D0%BD%D0%B8%D0%B8-get-4">настройки биддера кампании</a> добавлена онформация о дочерних элементах с отдельными настройками.</p>
</li>
<li>
<p>Настройки биддера и информация о запуске перенсены из общих настроек в <a href="#%D0%B1%D0%B8%D0%B4%D0%B4%D0%B5%D1%80">отдельный раздел управления биддером</a></p>
</li>
<li>
<p>В <a href="#%D0%BA%D0%B0%D0%BC%D0%BF%D0%B0%D0%BD%D0%B8%D0%B8-get-4">настройки биддера кампании</a> добавлен показатель попадания кампании при последнем срабатывании биддера.</p>
</li>
</ul>
<p><code>1.1.1</code></p>
<ul>
<li>В состояние биддера кампании добавлен <a href="#%D0%BA%D0%B0%D0%BC%D0%BF%D0%B0%D0%BD%D0%B8%D0%B8-get-4">показатель попадания ставки</a></li>
</ul>
<p><code>1.1</code></p>
<ul>
<li>
<p>Добавлена группа <a href="#%D0%BD%D0%B0%D1%81%D1%82%D1%80%D0%BE%D0%B9%D0%BA%D0%B8">настроек</a></p>
</li>
<li>
<p>Изменен <a href="#%D0%BA%D0%B0%D0%BC%D0%BF%D0%B0%D0%BD%D0%B8%D0%B8-post">метод добавления новой кампании</a></p>
</li>
<li>
<p>Добавлен метод получения <a href="%D0%BA%D0%B0%D0%BC%D0%BF%D0%B0%D0%BD%D0%B8%D0%B8-get-7">групп объявлений кампании</a></p>
</li>
<li>
<p>Добавлен раздел <a href="#%D0%BA%D0%BB%D1%8E%D1%87%D0%B5%D0%B2%D1%8B%D0%B5-%D1%84%D1%80%D0%B0%D0%B7%D1%8B">ключевых фраз</a></p>
</li>
<li>
<p>Добавлен метод <a href="#%D0%BA%D0%B0%D0%BC%D0%BF%D0%B0%D0%BD%D0%B8%D0%B8-get-5">ключевых фраз кампании</a></p>
</li>
<li>
<p>Добавлен метод <a href="#%D0%B3%D1%80%D1%83%D0%BF%D0%BF%D1%8B-%D0%BE%D0%B1%D1%8A%D1%8F%D0%B2%D0%BB%D0%B5%D0%BD%D0%B8%D0%B9-get-1">ключевых фраз группы объявлений</a></p>
</li>
</ul>
<h2 class="group-heading">Reference <a href="#" class="permalink">&para;</a></h2><div id="настройки" class="resource"><div id="настройки-get" class="action get"><div class="action-name"><span class="action-resource">Настройки</span><span class="action-dif">/</span><span class="action-title">Список профилей поисковых систем</span></div><h4 class="action-heading"><a href="#настройки-get" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/settings/profiles</div></h4><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span class="required"></span></td><td width="">data</td><td><span class="attribute-type">array</span><p></p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">id</td><td><span class="attribute-type">number</span><p>ID профиля</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">login</td><td><span class="attribute-type">string</span><p>Логин</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">type</td><td><span class="attribute-type">string</span><p>Тип</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">[
    {
      "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
      "<span class="hljs-attribute">login</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span>
    </span>}
  ]
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"array"</span></span>,
      "<span class="hljs-attribute">items</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
        "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-number">0</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID профиля"</span>
          </span>}</span>,
          "<span class="hljs-attribute">login</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-string">""</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Логин"</span>
          </span>}</span>,
          "<span class="hljs-attribute">type</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-string">""</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Тип"</span>
          </span>}
        </span>}</span>,
        "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
          <span class="hljs-string">"id"</span>,
          <span class="hljs-string">"login"</span>,
          <span class="hljs-string">"type"</span>
        ]</span>,
        "<span class="hljs-attribute">additionalProperties</span>": <span class="hljs-value"><span class="hljs-literal">false</span>
      </span>}
    </span>}
  </span>}</span>,
  "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
    <span class="hljs-string">"data"</span>
  ]
</span>}</code></pre></div></div></div></div></div></div><div id="проекты" class="resource"><div id="проекты-get" class="action get"><div class="action-name"><span class="action-resource">Проекты</span><span class="action-dif">/</span><span class="action-title">Список проектов</span></div><h4 class="action-heading"><a href="#проекты-get" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/projects</div></h4><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span class="required"></span></td><td width="">data</td><td><span class="attribute-type">array</span><p></p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">id</td><td><span class="attribute-type">number</span><p>ID проекта</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">caption</td><td><span class="attribute-type">number</span><p>Заголовок</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">icon</td><td><span class="attribute-type">string</span><p>Иконка</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">[
    {
      "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
      "<span class="hljs-attribute">caption</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
      "<span class="hljs-attribute">icon</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span>
    </span>}
  ]
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"array"</span></span>,
      "<span class="hljs-attribute">items</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
        "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-number">0</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID проекта"</span>
          </span>}</span>,
          "<span class="hljs-attribute">caption</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-number">0</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Заголовок"</span>
          </span>}</span>,
          "<span class="hljs-attribute">icon</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-string">""</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Иконка"</span>
          </span>}
        </span>}</span>,
        "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
          <span class="hljs-string">"id"</span>,
          <span class="hljs-string">"caption"</span>,
          <span class="hljs-string">"icon"</span>
        ]</span>,
        "<span class="hljs-attribute">additionalProperties</span>": <span class="hljs-value"><span class="hljs-literal">false</span>
      </span>}
    </span>}
  </span>}</span>,
  "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
    <span class="hljs-string">"data"</span>
  ]
</span>}</code></pre></div></div></div></div></div><div id="проекты-get-1" class="action get"><div class="action-name"><span class="action-resource">Проекты</span><span class="action-dif">/</span><span class="action-title">Детали проекта</span></div><h4 class="action-heading"><a href="#проекты-get-1" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/projects/{id}</div></h4><div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID проекта</p></td></tr></table></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span></span></td><td width="">id</td><td><span class="attribute-type">number</span><p>ID проекта</p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">caption</td><td><span class="attribute-type">number</span><p>Заголовок</p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">icon</td><td><span class="attribute-type">string</span><p>Иконка</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
  "<span class="hljs-attribute">caption</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
  "<span class="hljs-attribute">icon</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span>
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID проекта"</span>
    </span>}</span>,
    "<span class="hljs-attribute">caption</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Заголовок"</span>
    </span>}</span>,
    "<span class="hljs-attribute">icon</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Иконка"</span>
    </span>}
  </span>}
</span>}</code></pre></div></div></div></div></div><div id="проекты-get-2" class="action get"><div class="action-name"><span class="action-resource">Проекты</span><span class="action-dif">/</span><span class="action-title">Список сайтов</span></div><h4 class="action-heading"><a href="#проекты-get-2" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/projects/{id}/sites?{order}=&amp;{reverse}=</div></h4><div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID проекта</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td>order</td><td><span class="attribute-type">string</span><p>Поле для сортировки</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td>reverse</td><td><span class="attribute-type">boolean</span><p>Сортировка в обратном порядке</p></td></tr></table></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span class="required"></span></td><td width="">data</td><td><span class="attribute-type">array</span><p></p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">id</td><td><span class="attribute-type">number</span><p>ID сайта</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">domain</td><td><span class="attribute-type">string</span><p>Доменное имя сайта</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">[
    {
      "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
      "<span class="hljs-attribute">domain</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span>
    </span>}
  ]
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"array"</span></span>,
      "<span class="hljs-attribute">items</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
        "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-number">0</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID сайта"</span>
          </span>}</span>,
          "<span class="hljs-attribute">domain</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-string">""</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Доменное имя сайта"</span>
          </span>}
        </span>}</span>,
        "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
          <span class="hljs-string">"id"</span>,
          <span class="hljs-string">"domain"</span>
        ]</span>,
        "<span class="hljs-attribute">additionalProperties</span>": <span class="hljs-value"><span class="hljs-literal">false</span>
      </span>}
    </span>}
  </span>}</span>,
  "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
    <span class="hljs-string">"data"</span>
  ]
</span>}</code></pre></div></div></div></div></div><div id="проекты-get-3" class="action get"><div class="action-name"><span class="action-resource">Проекты</span><span class="action-dif">/</span><span class="action-title">Список кампаний</span></div><h4 class="action-heading"><a href="#проекты-get-3" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/projects/{id}/campaigns</div></h4><div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID проекта</p></td></tr></table></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span class="required"></span></td><td width="">data</td><td><span class="attribute-type">array</span><p></p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">id</td><td><span class="attribute-type">number</span><p>ID кампании</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">site_id</td><td><span class="attribute-type">number</span><p>ID сайта, к которому привязана кампания</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">caption</td><td><span class="attribute-type">string</span><p>Заголовок кампании</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">[
    {
      "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
      "<span class="hljs-attribute">site_id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
      "<span class="hljs-attribute">caption</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span>
    </span>}
  ]
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"array"</span></span>,
      "<span class="hljs-attribute">items</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
        "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-number">0</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID кампании"</span>
          </span>}</span>,
          "<span class="hljs-attribute">site_id</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-number">0</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID сайта, к которому привязана кампания"</span>
          </span>}</span>,
          "<span class="hljs-attribute">caption</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-string">""</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Заголовок кампании"</span>
          </span>}
        </span>}</span>,
        "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
          <span class="hljs-string">"id"</span>,
          <span class="hljs-string">"site_id"</span>,
          <span class="hljs-string">"caption"</span>
        ]</span>,
        "<span class="hljs-attribute">additionalProperties</span>": <span class="hljs-value"><span class="hljs-literal">false</span>
      </span>}
    </span>}
  </span>}</span>,
  "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
    <span class="hljs-string">"data"</span>
  ]
</span>}</code></pre></div></div></div></div></div><div id="проекты-get-4" class="action get"><div class="action-name"><span class="action-resource">Проекты</span><span class="action-dif">/</span><span class="action-title">Общая статистика проекта</span></div><h4 class="action-heading"><a href="#проекты-get-4" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/projects/{id}/statistics/summary?{from}=&amp;{to}=</div></h4><p>Возвращает объект с суммой статистик по кампаниям проекта за указанный период.</p>
<div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID проекта</p></td></tr><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>from</td><td><span class="attribute-type">string</span><p>Дата начала периода в формате `YYYY-mm-dd`.</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td>to</td><td><span class="attribute-type">string</span><p>Дата окончания периода (опционально для периода больше 1 дня).</p></td></tr></table></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span></span></td><td width="">cost</td><td><span class="attribute-type">number</span><p>Потраченная сумма(руб.).</p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">views</td><td><span class="attribute-type">number</span><p>Кол-во просмотров рекламных объявлений за период.</p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">clicks</td><td><span class="attribute-type">number</span><p>Кол-во кликов по рекламе за период.</p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">calls</td><td><span class="attribute-type">number</span><p>Кол-во звонков</p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">emails</td><td><span class="attribute-type">number</span><p>Кол-во писем</p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">orders</td><td><span class="attribute-type">number</span><p>Кол-во заказов с сайтов проекта.</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">cost</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
  "<span class="hljs-attribute">views</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
  "<span class="hljs-attribute">clicks</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
  "<span class="hljs-attribute">calls</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
  "<span class="hljs-attribute">emails</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
  "<span class="hljs-attribute">orders</span>": <span class="hljs-value"><span class="hljs-number">1</span>
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">cost</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Потраченная сумма(руб.)."</span>
    </span>}</span>,
    "<span class="hljs-attribute">views</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во просмотров рекламных объявлений за период."</span>
    </span>}</span>,
    "<span class="hljs-attribute">clicks</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во кликов по рекламе за период."</span>
    </span>}</span>,
    "<span class="hljs-attribute">calls</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во звонков"</span>
    </span>}</span>,
    "<span class="hljs-attribute">emails</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во писем"</span>
    </span>}</span>,
    "<span class="hljs-attribute">orders</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во заказов с сайтов проекта."</span>
    </span>}
  </span>}
</span>}</code></pre></div></div></div></div></div><div id="проекты-get-5" class="action get"><div class="action-name"><span class="action-resource">Проекты</span><span class="action-dif">/</span><span class="action-title">Подробная статистика проекта</span></div><h4 class="action-heading"><a href="#проекты-get-5" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/projects/{id}/statistics/details?{from}=&amp;{to}=</div></h4><p>Возвращает массив объектов с суммой почасовых статистик по всем кампаниям проекта за указанный период.</p>
<div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID проекта</p></td></tr><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>from</td><td><span class="attribute-type">string</span><p>Дата начала периода в формате `YYYY-mm-dd`.</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td>to</td><td><span class="attribute-type">string</span><p>Дата окончания периода (опционально для периода больше 1 дня).</p></td></tr></table></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span class="required"></span></td><td width="">data</td><td><span class="attribute-type">array</span><p></p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">time</td><td><span class="attribute-type">string</span><p>Время, за которое предоставляется стастистика (в формате UTC).</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">statistics</td><td><span class="attribute-type">object</span><p>Объект со статистикой за указанное время</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">cost</td><td><span class="attribute-type">number</span><p>Потраченная сумма(руб.).</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">views</td><td><span class="attribute-type">number</span><p>Кол-во просмотров рекламных объявлений за период.</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">clicks</td><td><span class="attribute-type">number</span><p>Кол-во кликов по рекламе за период.</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">calls</td><td><span class="attribute-type">number</span><p>Кол-во звонков</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">emails</td><td><span class="attribute-type">number</span><p>Кол-во писем</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">orders</td><td><span class="attribute-type">number</span><p>Кол-во заказов с сайтов проекта.</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">[
    {
      "<span class="hljs-attribute">time</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
      "<span class="hljs-attribute">statistics</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">cost</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
        "<span class="hljs-attribute">views</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
        "<span class="hljs-attribute">clicks</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
        "<span class="hljs-attribute">calls</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
        "<span class="hljs-attribute">emails</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
        "<span class="hljs-attribute">orders</span>": <span class="hljs-value"><span class="hljs-number">1</span>
      </span>}
    </span>}
  ]
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"array"</span></span>,
      "<span class="hljs-attribute">items</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
        "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">time</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-string">""</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Время, за которое предоставляется стастистика (в формате UTC)."</span>
          </span>}</span>,
          "<span class="hljs-attribute">statistics</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
            "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
              "<span class="hljs-attribute">cost</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-number">0</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Потраченная сумма(руб.)."</span>
              </span>}</span>,
              "<span class="hljs-attribute">views</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-number">0</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во просмотров рекламных объявлений за период."</span>
              </span>}</span>,
              "<span class="hljs-attribute">clicks</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-number">0</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во кликов по рекламе за период."</span>
              </span>}</span>,
              "<span class="hljs-attribute">calls</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-number">0</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во звонков"</span>
              </span>}</span>,
              "<span class="hljs-attribute">emails</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-number">0</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во писем"</span>
              </span>}</span>,
              "<span class="hljs-attribute">orders</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-number">0</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во заказов с сайтов проекта."</span>
              </span>}
            </span>}</span>,
            "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
              <span class="hljs-string">"cost"</span>,
              <span class="hljs-string">"views"</span>,
              <span class="hljs-string">"clicks"</span>,
              <span class="hljs-string">"calls"</span>,
              <span class="hljs-string">"emails"</span>,
              <span class="hljs-string">"orders"</span>
            ]</span>,
            "<span class="hljs-attribute">additionalProperties</span>": <span class="hljs-value"><span class="hljs-literal">false</span></span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Объект со статистикой за указанное время"</span>
          </span>}
        </span>}</span>,
        "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
          <span class="hljs-string">"time"</span>,
          <span class="hljs-string">"statistics"</span>
        ]</span>,
        "<span class="hljs-attribute">additionalProperties</span>": <span class="hljs-value"><span class="hljs-literal">false</span>
      </span>}
    </span>}
  </span>}</span>,
  "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
    <span class="hljs-string">"data"</span>
  ]
</span>}</code></pre></div></div></div></div></div><div id="проекты-get-6" class="action get"><div class="action-name"><span class="action-resource">Проекты</span><span class="action-dif">/</span><span class="action-title">Список заявок</span></div><h4 class="action-heading"><a href="#проекты-get-6" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/projects/{id}/leads?{from}=&amp;{to}=&amp;{order}=&amp;{reverse}</div></h4><div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID проекта</p></td></tr><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>from</td><td><span class="attribute-type">string</span><p>Дата начала периода в формате `YYYY-mm-dd`.</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td>to</td><td><span class="attribute-type">string</span><p>Дата окончания периода (опционально для периода больше 1 дня).</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td>order</td><td><span class="attribute-type">string</span><p>Поле для сортировки</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td>reverse</td><td><span class="attribute-type">boolean</span><p>Сортировка в обратном порядке</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td>page</td><td><span class="attribute-type">string</span><p>Номер страницы списка (начиная от 1) и количество результатов на странице, разделенные запятыми</p></td></tr></table></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span class="required"></span></td><td width="">data</td><td><span class="attribute-type">array</span><p></p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">site_id</td><td><span class="attribute-type">number</span><p>ID сайта</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">type</td><td><span class="attribute-type">string</span><p>Тип заявки</p><p><b>email</b></p><p><b>call</b></p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">source</td><td><span class="attribute-type">string</span><p>Источник заявки</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">campaign</td><td><span class="attribute-type">string</span><p>Кампания</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">keyword</td><td><span class="attribute-type">string</span><p>Ключевое слово</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">place</td><td><span class="attribute-type">string</span><p>Место показа</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">time</td><td><span class="attribute-type">string</span><p>Время заявки</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">phone</td><td><span class="attribute-type">string</span><p>Номер телефона</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">unique</td><td><span class="attribute-type">number</span><p>(опционально для звонков) Флаг уникальности звонка</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">duration</td><td><span class="attribute-type">number</span><p>(опционально для звонков) Длительность звонка</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">[
    {
      "<span class="hljs-attribute">site_id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"email"</span></span>,
      "<span class="hljs-attribute">source</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
      "<span class="hljs-attribute">campaign</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
      "<span class="hljs-attribute">keyword</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
      "<span class="hljs-attribute">place</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
      "<span class="hljs-attribute">time</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
      "<span class="hljs-attribute">phone</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
      "<span class="hljs-attribute">unique</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
      "<span class="hljs-attribute">duration</span>": <span class="hljs-value"><span class="hljs-number">1</span>
    </span>}
  ]
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"array"</span></span>,
      "<span class="hljs-attribute">items</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
        "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">site_id</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-number">0</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID сайта"</span>
          </span>}</span>,
          "<span class="hljs-attribute">type</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-string">"email"</span>,
              <span class="hljs-string">"call"</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Тип заявки"</span>
          </span>}</span>,
          "<span class="hljs-attribute">source</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-string">""</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Источник заявки"</span>
          </span>}</span>,
          "<span class="hljs-attribute">campaign</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-string">""</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кампания"</span>
          </span>}</span>,
          "<span class="hljs-attribute">keyword</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-string">""</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Ключевое слово"</span>
          </span>}</span>,
          "<span class="hljs-attribute">place</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-string">""</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Место показа"</span>
          </span>}</span>,
          "<span class="hljs-attribute">time</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-string">""</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Время заявки"</span>
          </span>}</span>,
          "<span class="hljs-attribute">phone</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-string">""</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Номер телефона"</span>
          </span>}</span>,
          "<span class="hljs-attribute">unique</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-number">0</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"(опционально для звонков) Флаг уникальности звонка"</span>
          </span>}</span>,
          "<span class="hljs-attribute">duration</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-number">0</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"(опционально для звонков) Длительность звонка"</span>
          </span>}
        </span>}</span>,
        "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
          <span class="hljs-string">"site_id"</span>,
          <span class="hljs-string">"type"</span>,
          <span class="hljs-string">"source"</span>,
          <span class="hljs-string">"campaign"</span>,
          <span class="hljs-string">"keyword"</span>,
          <span class="hljs-string">"place"</span>,
          <span class="hljs-string">"time"</span>,
          <span class="hljs-string">"phone"</span>,
          <span class="hljs-string">"unique"</span>,
          <span class="hljs-string">"duration"</span>
        ]</span>,
        "<span class="hljs-attribute">additionalProperties</span>": <span class="hljs-value"><span class="hljs-literal">false</span>
      </span>}
    </span>}
  </span>}</span>,
  "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
    <span class="hljs-string">"data"</span>
  ]
</span>}</code></pre></div></div></div></div></div><div id="проекты-get-7" class="action get"><div class="action-name"><span class="action-resource">Проекты</span><span class="action-dif">/</span><span class="action-title">Календарь стоимости заказа</span></div><h4 class="action-heading"><a href="#проекты-get-7" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/projects/{id}/orders/cost?{from}=&amp;{to}=</div></h4><p>Возвращает среднюю стоимость заказа за день по всем кампаниям проекта. Для расчета учитывается количество заказов и сумма расходов по всем кампаниям, полученная из статистики.</p>
<div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID проекта</p></td></tr><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>from</td><td><span class="attribute-type">string</span><p>Дата начала периода в формате `YYYY-mm-dd`.</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td>to</td><td><span class="attribute-type">string</span><p>Дата окончания периода (опционально для периода больше 1 дня).</p></td></tr></table></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span class="required"></span></td><td width="">data</td><td><span class="attribute-type">array</span><p></p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">date</td><td><span class="attribute-type">string</span><p>Дата</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">cost</td><td><span class="attribute-type">number</span><p>Стоимость клика</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">[
    {
      "<span class="hljs-attribute">date</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
      "<span class="hljs-attribute">cost</span>": <span class="hljs-value"><span class="hljs-number">1</span>
    </span>}
  ]
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"array"</span></span>,
      "<span class="hljs-attribute">items</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
        "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">date</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-string">""</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Дата"</span>
          </span>}</span>,
          "<span class="hljs-attribute">cost</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-number">0</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Стоимость клика"</span>
          </span>}
        </span>}</span>,
        "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
          <span class="hljs-string">"date"</span>,
          <span class="hljs-string">"cost"</span>
        ]</span>,
        "<span class="hljs-attribute">additionalProperties</span>": <span class="hljs-value"><span class="hljs-literal">false</span>
      </span>}
    </span>}
  </span>}</span>,
  "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
    <span class="hljs-string">"data"</span>
  ]
</span>}</code></pre></div></div></div></div></div></div><div id="сайты" class="resource"><div id="сайты-get" class="action get"><div class="action-name"><span class="action-resource">Сайты</span><span class="action-dif">/</span><span class="action-title">Список сайтов</span></div><h4 class="action-heading"><a href="#сайты-get" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/sites?{order}=&amp;{reverse}=</div></h4><div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span></span></td><td>order</td><td><span class="attribute-type">string</span><p>Поле для сортировки</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td>reverse</td><td><span class="attribute-type">boolean</span><p>Сортировка в обратном порядке</p></td></tr></table></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span class="required"></span></td><td width="">data</td><td><span class="attribute-type">array</span><p></p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">id</td><td><span class="attribute-type">number</span><p>ID сайта</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">domain</td><td><span class="attribute-type">string</span><p>Доменное имя сайта</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">project_id</td><td><span class="attribute-type">number</span><p>ID проекта, которому принадлежит сайт</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">[
    {
      "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
      "<span class="hljs-attribute">domain</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
      "<span class="hljs-attribute">project_id</span>": <span class="hljs-value"><span class="hljs-number">1</span>
    </span>}
  ]
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"array"</span></span>,
      "<span class="hljs-attribute">items</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
        "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-number">0</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID сайта"</span>
          </span>}</span>,
          "<span class="hljs-attribute">domain</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-string">""</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Доменное имя сайта"</span>
          </span>}</span>,
          "<span class="hljs-attribute">project_id</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-number">0</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID проекта, которому принадлежит сайт"</span>
          </span>}
        </span>}</span>,
        "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
          <span class="hljs-string">"id"</span>,
          <span class="hljs-string">"domain"</span>,
          <span class="hljs-string">"project_id"</span>
        ]</span>,
        "<span class="hljs-attribute">additionalProperties</span>": <span class="hljs-value"><span class="hljs-literal">false</span>
      </span>}
    </span>}
  </span>}</span>,
  "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
    <span class="hljs-string">"data"</span>
  ]
</span>}</code></pre></div></div></div></div></div><div id="сайты-post" class="action post"><div class="action-name"><span class="action-resource">Сайты</span><span class="action-dif">/</span><span class="action-title">Добавить новый сайт</span></div><h4 class="action-heading"><a href="#сайты-post" class="method post">POST</a><div class="code">http://analitics.catkitcms.ru/api/sites</div></h4><div class="title"><strong>Request</strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span class="required"></span></td><td width="">project_id</td><td><span class="attribute-type">number</span><p>ID проекта, к которому относится сайт.</p></td></tr><tr><td class="attribute-status"><span class="required"></span></td><td width="">domain</td><td><span class="attribute-type">string</span><p>Доменное имя сайта.</p></td></tr></thead></table></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">project_id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
  "<span class="hljs-attribute">domain</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span>
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">project_id</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID проекта, к которому относится сайт."</span>
    </span>}</span>,
    "<span class="hljs-attribute">domain</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Доменное имя сайта."</span>
    </span>}
  </span>}</span>,
  "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
    <span class="hljs-string">"project_id"</span>,
    <span class="hljs-string">"domain"</span>
  ]</span>,
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span>
</span>}</code></pre></div></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span></span></td><td width="">data</td><td><span class="attribute-type">object</span><p></p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">id</td><td><span class="attribute-type">number</span><p>ID добавленного сайта</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
      "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID добавленного сайта"</span>
        </span>}
      </span>}
    </span>}
  </span>}
</span>}</code></pre></div></div></div></div></div><div id="сайты-get-1" class="action get"><div class="action-name"><span class="action-resource">Сайты</span><span class="action-dif">/</span><span class="action-title">Детали сайта</span></div><h4 class="action-heading"><a href="#сайты-get-1" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/sites/{id}</div></h4><div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID сайта.</p></td></tr></table></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span></span></td><td width="">id</td><td><span class="attribute-type">number</span><p>ID сайта</p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">domain</td><td><span class="attribute-type">string</span><p>Доменное имя сайта</p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">project_id</td><td><span class="attribute-type">number</span><p>ID проекта, которому принадлежит сайт</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
  "<span class="hljs-attribute">domain</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
  "<span class="hljs-attribute">project_id</span>": <span class="hljs-value"><span class="hljs-number">1</span>
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID сайта"</span>
    </span>}</span>,
    "<span class="hljs-attribute">domain</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Доменное имя сайта"</span>
    </span>}</span>,
    "<span class="hljs-attribute">project_id</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID проекта, которому принадлежит сайт"</span>
    </span>}
  </span>}
</span>}</code></pre></div></div></div></div></div><div id="сайты-delete" class="action delete"><div class="action-name"><span class="action-resource">Сайты</span><span class="action-dif">/</span><span class="action-title">Удалить сайт</span></div><h4 class="action-heading"><a href="#сайты-delete" class="method delete">DELETE</a><div class="code">http://analitics.catkitcms.ru/api/sites/{id}</div></h4><div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID сайта.</p></td></tr></table></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button">Headers</a></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div></div></div></div></div><div id="сайты-get-2" class="action get"><div class="action-name"><span class="action-resource">Сайты</span><span class="action-dif">/</span><span class="action-title">Список кампаний</span></div><h4 class="action-heading"><a href="#сайты-get-2" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/sites/{id}/campaigns</div></h4><div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID сайта.</p></td></tr></table></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span class="required"></span></td><td width="">data</td><td><span class="attribute-type">array</span><p></p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">id</td><td><span class="attribute-type">number</span><p>ID кампании</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">site_id</td><td><span class="attribute-type">number</span><p>ID сайта, к которому привязана кампания</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">caption</td><td><span class="attribute-type">string</span><p>Заголовок кампании</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">[
    {
      "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
      "<span class="hljs-attribute">site_id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
      "<span class="hljs-attribute">caption</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span>
    </span>}
  ]
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"array"</span></span>,
      "<span class="hljs-attribute">items</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
        "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-number">0</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID кампании"</span>
          </span>}</span>,
          "<span class="hljs-attribute">site_id</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-number">0</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID сайта, к которому привязана кампания"</span>
          </span>}</span>,
          "<span class="hljs-attribute">caption</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-string">""</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Заголовок кампании"</span>
          </span>}
        </span>}</span>,
        "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
          <span class="hljs-string">"id"</span>,
          <span class="hljs-string">"site_id"</span>,
          <span class="hljs-string">"caption"</span>
        ]</span>,
        "<span class="hljs-attribute">additionalProperties</span>": <span class="hljs-value"><span class="hljs-literal">false</span>
      </span>}
    </span>}
  </span>}</span>,
  "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
    <span class="hljs-string">"data"</span>
  ]
</span>}</code></pre></div></div></div></div></div><div id="сайты-post-1" class="action post"><div class="action-name"><span class="action-resource">Сайты</span><span class="action-dif">/</span><span class="action-title">Добавление заказа</span></div><h4 class="action-heading"><a href="#сайты-post-1" class="method post">POST</a><div class="code">http://analitics.catkitcms.ru/api/sites/{id}/orders</div></h4><div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID сайта.</p></td></tr></table></div><div class="title"><strong>Request</strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span></span></td><td width="">count</td><td><span class="attribute-type">number</span><p>Количество заказов (позволяет создать заказ с количеством более 1).</p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">comment</td><td><span class="attribute-type">string</span><p>Комментарий к заказу.</p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">time</td><td><span class="attribute-type">string</span><p>Время заказа в формате `Y-m-d H:i:s` (по умолчанию будет установлено текущее время).</p></td></tr></thead></table></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">count</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
  "<span class="hljs-attribute">comment</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
  "<span class="hljs-attribute">time</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span>
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">count</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Количество заказов (позволяет создать заказ с количеством более 1)."</span>
    </span>}</span>,
    "<span class="hljs-attribute">comment</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Комментарий к заказу."</span>
    </span>}</span>,
    "<span class="hljs-attribute">time</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Время заказа в формате `Y-m-d H:i:s` (по умолчанию будет установлено текущее время)."</span>
    </span>}
  </span>}</span>,
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span>
</span>}</code></pre></div></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span></span></td><td width="">id</td><td><span class="attribute-type">number</span><p>ID добавленного заказа</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span>
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID добавленного заказа"</span>
    </span>}
  </span>}
</span>}</code></pre></div></div></div></div></div><div id="сайты-post-2" class="action post"><div class="action-name"><span class="action-resource">Сайты</span><span class="action-dif">/</span><span class="action-title">Добавление произвольного расхода</span></div><h4 class="action-heading"><a href="#сайты-post-2" class="method post">POST</a><div class="code">http://analitics.catkitcms.ru/api/sites/{id}/costs</div></h4><div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID сайта.</p></td></tr></table></div><div class="title"><strong>Request</strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span class="required"></span></td><td width="">cost</td><td><span class="attribute-type">number</span><p>Сумма расхода.</p></td></tr><tr><td class="attribute-status"><span class="required"></span></td><td width="">comment</td><td><span class="attribute-type">string</span><p>Комментарий к заказу.</p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">time</td><td><span class="attribute-type">string</span><p>Время заказа в формате `Y-m-d H:i:s` (по умолчанию будет установлено текущее время).</p></td></tr></thead></table></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">cost</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
  "<span class="hljs-attribute">comment</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
  "<span class="hljs-attribute">time</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span>
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">cost</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Сумма расхода."</span>
    </span>}</span>,
    "<span class="hljs-attribute">comment</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Комментарий к заказу."</span>
    </span>}</span>,
    "<span class="hljs-attribute">time</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Время заказа в формате `Y-m-d H:i:s` (по умолчанию будет установлено текущее время)."</span>
    </span>}
  </span>}</span>,
  "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
    <span class="hljs-string">"cost"</span>,
    <span class="hljs-string">"comment"</span>
  ]</span>,
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span>
</span>}</code></pre></div></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span></span></td><td width="">id</td><td><span class="attribute-type">number</span><p>ID добавленной записи</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span>
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID добавленной записи"</span>
    </span>}
  </span>}
</span>}</code></pre></div></div></div></div></div><div id="сайты-get-3" class="action get"><div class="action-name"><span class="action-resource">Сайты</span><span class="action-dif">/</span><span class="action-title">Общая статистика сайта</span></div><h4 class="action-heading"><a href="#сайты-get-3" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/sites/{id}/statistics/summary?{from}=&amp;{to}=</div></h4><p>Возвращает объект с суммой статистик по всем кампаниям, принадлежащим сайту, за указанный период.</p>
<div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID сайта</p></td></tr><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>from</td><td><span class="attribute-type">string</span><p>Дата начала периода в формате `YYYY-mm-dd`.</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td>to</td><td><span class="attribute-type">string</span><p>Дата окончания периода (опционально для периода больше 1 дня).</p></td></tr></table></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span></span></td><td width="">cost</td><td><span class="attribute-type">number</span><p>Потраченная сумма(руб.).</p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">views</td><td><span class="attribute-type">number</span><p>Кол-во просмотров рекламных объявлений за период.</p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">clicks</td><td><span class="attribute-type">number</span><p>Кол-во кликов по рекламе за период.</p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">calls</td><td><span class="attribute-type">number</span><p>Кол-во звонков</p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">emails</td><td><span class="attribute-type">number</span><p>Кол-во писем</p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">orders</td><td><span class="attribute-type">number</span><p>Кол-во заказов с сайта</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">cost</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
  "<span class="hljs-attribute">views</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
  "<span class="hljs-attribute">clicks</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
  "<span class="hljs-attribute">calls</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
  "<span class="hljs-attribute">emails</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
  "<span class="hljs-attribute">orders</span>": <span class="hljs-value"><span class="hljs-number">1</span>
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">cost</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Потраченная сумма(руб.)."</span>
    </span>}</span>,
    "<span class="hljs-attribute">views</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во просмотров рекламных объявлений за период."</span>
    </span>}</span>,
    "<span class="hljs-attribute">clicks</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во кликов по рекламе за период."</span>
    </span>}</span>,
    "<span class="hljs-attribute">calls</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во звонков"</span>
    </span>}</span>,
    "<span class="hljs-attribute">emails</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во писем"</span>
    </span>}</span>,
    "<span class="hljs-attribute">orders</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во заказов с сайта"</span>
    </span>}
  </span>}
</span>}</code></pre></div></div></div></div></div><div id="сайты-get-4" class="action get"><div class="action-name"><span class="action-resource">Сайты</span><span class="action-dif">/</span><span class="action-title">Подробная статистика сайта</span></div><h4 class="action-heading"><a href="#сайты-get-4" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/sites/{id}/statistics/details?{from}=&amp;{to}=</div></h4><p>Возвращает массив объектов с суммой почасовых статистик по всем кампаниям проекта за указанный период.</p>
<div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID сайта</p></td></tr><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>from</td><td><span class="attribute-type">string</span><p>Дата начала периода в формате `YYYY-mm-dd`.</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td>to</td><td><span class="attribute-type">string</span><p>Дата окончания периода (опционально для периода больше 1 дня).</p></td></tr></table></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span class="required"></span></td><td width="">data</td><td><span class="attribute-type">array</span><p></p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">time</td><td><span class="attribute-type">string</span><p>Время, за которое предоставляется стастистика (в формате UTC).</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">statistics</td><td><span class="attribute-type">object</span><p>Объект со статистикой за указанное время</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">cost</td><td><span class="attribute-type">number</span><p>Потраченная сумма(руб.).</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">views</td><td><span class="attribute-type">number</span><p>Кол-во просмотров рекламных объявлений за период.</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">clicks</td><td><span class="attribute-type">number</span><p>Кол-во кликов по рекламе за период.</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">calls</td><td><span class="attribute-type">number</span><p>Кол-во звонков</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">emails</td><td><span class="attribute-type">number</span><p>Кол-во писем</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">orders</td><td><span class="attribute-type">number</span><p>Кол-во заказов с сайта</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">[
    {
      "<span class="hljs-attribute">time</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
      "<span class="hljs-attribute">statistics</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">cost</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
        "<span class="hljs-attribute">views</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
        "<span class="hljs-attribute">clicks</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
        "<span class="hljs-attribute">calls</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
        "<span class="hljs-attribute">emails</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
        "<span class="hljs-attribute">orders</span>": <span class="hljs-value"><span class="hljs-number">1</span>
      </span>}
    </span>}
  ]
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"array"</span></span>,
      "<span class="hljs-attribute">items</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
        "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">time</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-string">""</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Время, за которое предоставляется стастистика (в формате UTC)."</span>
          </span>}</span>,
          "<span class="hljs-attribute">statistics</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
            "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
              "<span class="hljs-attribute">cost</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-number">0</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Потраченная сумма(руб.)."</span>
              </span>}</span>,
              "<span class="hljs-attribute">views</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-number">0</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во просмотров рекламных объявлений за период."</span>
              </span>}</span>,
              "<span class="hljs-attribute">clicks</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-number">0</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во кликов по рекламе за период."</span>
              </span>}</span>,
              "<span class="hljs-attribute">calls</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-number">0</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во звонков"</span>
              </span>}</span>,
              "<span class="hljs-attribute">emails</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-number">0</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во писем"</span>
              </span>}</span>,
              "<span class="hljs-attribute">orders</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-number">0</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во заказов с сайта"</span>
              </span>}
            </span>}</span>,
            "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
              <span class="hljs-string">"cost"</span>,
              <span class="hljs-string">"views"</span>,
              <span class="hljs-string">"clicks"</span>,
              <span class="hljs-string">"calls"</span>,
              <span class="hljs-string">"emails"</span>,
              <span class="hljs-string">"orders"</span>
            ]</span>,
            "<span class="hljs-attribute">additionalProperties</span>": <span class="hljs-value"><span class="hljs-literal">false</span></span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Объект со статистикой за указанное время"</span>
          </span>}
        </span>}</span>,
        "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
          <span class="hljs-string">"time"</span>,
          <span class="hljs-string">"statistics"</span>
        ]</span>,
        "<span class="hljs-attribute">additionalProperties</span>": <span class="hljs-value"><span class="hljs-literal">false</span>
      </span>}
    </span>}
  </span>}</span>,
  "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
    <span class="hljs-string">"data"</span>
  ]
</span>}</code></pre></div></div></div></div></div><div id="сайты-put" class="action put"><div class="action-name"><span class="action-resource">Сайты</span><span class="action-dif">/</span><span class="action-title">Обновление статистики сайта</span></div><h4 class="action-heading"><a href="#сайты-put" class="method put">PUT</a><div class="code">http://analitics.catkitcms.ru/api/sites/{id}/statistics?{date}</div></h4><div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID сайта</p></td></tr><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>date</td><td><span class="attribute-type">string</span><p>Дата для изменения статистики</p></td></tr></table></div><div class="title"><strong>Request</strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span></span></td><td width="">orders</td><td><span class="attribute-type">number</span><p>Количество заказов за указанный в date день</p></td></tr></thead></table></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">orders</span>": <span class="hljs-value"><span class="hljs-number">1</span>
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">orders</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Количество заказов за указанный в date день"</span>
    </span>}
  </span>}</span>,
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span>
</span>}</code></pre></div></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button">Headers</a></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div></div></div></div></div><div id="сайты-put-1" class="action put"><div class="action-name"><span class="action-resource">Сайты</span><span class="action-dif">/</span><span class="action-title">Обновление UTM меток</span></div><h4 class="action-heading"><a href="#сайты-put-1" class="method put">PUT</a><div class="code">http://analitics.catkitcms.ru/api/sites/{id}/utm?{method}</div></h4><p>Обновляет UTM метки для ссылок в объявлениях всех кампаний, принадлежащик сайту.</p>
<div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID сайта</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td>method</td><td><span class="attribute-type">string</span><p>Способ задания меток</p><p><b>only</b> - Установить только заданные метки, остальные удалить</p><p><b>replace</b> - Обновить заданные метки, остальные не изменять. Выбран по умолчанию</p><p><b>all</b> - Обновить заданные метки, остальные очистить</p></td></tr></table></div><div class="title"><strong>Request</strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span></span></td><td width="">utm_source</td><td><span class="attribute-type">string</span><p></p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">utm_medium</td><td><span class="attribute-type">string</span><p></p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">utm_campaign</td><td><span class="attribute-type">string</span><p></p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">utm_content</td><td><span class="attribute-type">string</span><p></p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">utm_term</td><td><span class="attribute-type">string</span><p></p></td></tr></thead></table></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">utm_source</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
  "<span class="hljs-attribute">utm_medium</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
  "<span class="hljs-attribute">utm_campaign</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
  "<span class="hljs-attribute">utm_content</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
  "<span class="hljs-attribute">utm_term</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span>
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">utm_source</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span>
    </span>}</span>,
    "<span class="hljs-attribute">utm_medium</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span>
    </span>}</span>,
    "<span class="hljs-attribute">utm_campaign</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span>
    </span>}</span>,
    "<span class="hljs-attribute">utm_content</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span>
    </span>}</span>,
    "<span class="hljs-attribute">utm_term</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span>
    </span>}
  </span>}</span>,
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span>
</span>}</code></pre></div></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button">Headers</a></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div></div></div></div></div></div><div id="кампании" class="resource"><div id="кампании-get" class="action get"><div class="action-name"><span class="action-resource">Кампании</span><span class="action-dif">/</span><span class="action-title">Список кампаний</span></div><h4 class="action-heading"><a href="#кампании-get" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/campaigns</div></h4><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span class="required"></span></td><td width="">data</td><td><span class="attribute-type">array</span><p></p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">id</td><td><span class="attribute-type">number</span><p>ID кампании</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">site_id</td><td><span class="attribute-type">number</span><p>ID сайта, которому принадлежит кампания</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">caption</td><td><span class="attribute-type">string</span><p>Заголовок кампании</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">[
    {
      "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">0</span></span>,
      "<span class="hljs-attribute">site_id</span>": <span class="hljs-value"><span class="hljs-number">0</span></span>,
      "<span class="hljs-attribute">caption</span>": <span class="hljs-value"><span class="hljs-string">""</span>
    </span>}
  ]
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"array"</span></span>,
      "<span class="hljs-attribute">items</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
        "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-number">0</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID кампании"</span>
          </span>}</span>,
          "<span class="hljs-attribute">site_id</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-number">0</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID сайта, которому принадлежит кампания"</span>
          </span>}</span>,
          "<span class="hljs-attribute">caption</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-string">""</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Заголовок кампании"</span>
          </span>}
        </span>}</span>,
        "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
          <span class="hljs-string">"id"</span>,
          <span class="hljs-string">"site_id"</span>,
          <span class="hljs-string">"caption"</span>
        ]</span>,
        "<span class="hljs-attribute">additionalProperties</span>": <span class="hljs-value"><span class="hljs-literal">false</span>
      </span>}
    </span>}
  </span>}</span>,
  "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
    <span class="hljs-string">"data"</span>
  ]
</span>}</code></pre></div></div></div></div></div><div id="кампании-post" class="action post"><div class="action-name"><span class="action-resource">Кампании</span><span class="action-dif">/</span><span class="action-title">Добавить новую кампанию</span></div><h4 class="action-heading"><a href="#кампании-post" class="method post">POST</a><div class="code">http://analitics.catkitcms.ru/api/campaigns</div></h4><div class="title"><strong>Request</strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span class="required"></span></td><td width="">site_id</td><td><span class="attribute-type">number</span><p>ID сайта, к которому относится кампания</p></td></tr><tr><td class="attribute-status"><span class="required"></span></td><td width="">profile_id</td><td><span class="attribute-type">number</span><p>ID профиля, которому принадлежит кампания</p></td></tr><tr><td class="attribute-status"><span class="required"></span></td><td width="">key</td><td><span class="attribute-type">number</span><p>Идентификатор кампании в соответствующей профилю системе</p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">caption</td><td><span class="attribute-type">string</span><p>Название кампании</p></td></tr></thead></table></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">site_id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
  "<span class="hljs-attribute">profile_id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
  "<span class="hljs-attribute">key</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
  "<span class="hljs-attribute">caption</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span>
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">site_id</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID сайта, к которому относится кампания"</span>
    </span>}</span>,
    "<span class="hljs-attribute">profile_id</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID профиля, которому принадлежит кампания"</span>
    </span>}</span>,
    "<span class="hljs-attribute">key</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Идентификатор кампании в соответствующей профилю системе"</span>
    </span>}</span>,
    "<span class="hljs-attribute">caption</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Название кампании"</span>
    </span>}
  </span>}</span>,
  "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
    <span class="hljs-string">"site_id"</span>,
    <span class="hljs-string">"profile_id"</span>,
    <span class="hljs-string">"key"</span>
  ]</span>,
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span>
</span>}</code></pre></div></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span></span></td><td width="">data</td><td><span class="attribute-type">object</span><p></p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">id</td><td><span class="attribute-type">number</span><p>ID добавленной кампании</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
      "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID добавленной кампании"</span>
        </span>}
      </span>}
    </span>}
  </span>}
</span>}</code></pre></div></div></div></div></div><div id="кампании-get-1" class="action get"><div class="action-name"><span class="action-resource">Кампании</span><span class="action-dif">/</span><span class="action-title">Детали кампании</span></div><h4 class="action-heading"><a href="#кампании-get-1" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/campaigns/{id}</div></h4><div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID кампании</p></td></tr></table></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span></span></td><td width="">id</td><td><span class="attribute-type">number</span><p>ID кампании</p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">site_id</td><td><span class="attribute-type">number</span><p>ID сайта, которому принадлежит кампания</p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">caption</td><td><span class="attribute-type">string</span><p>Заголовок кампании</p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">type</td><td><span class="attribute-type">string</span><p>Тип кампании</p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">num</td><td><span class="attribute-type">number</span><p>Номер кампании в системе статистики</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">0</span></span>,
  "<span class="hljs-attribute">site_id</span>": <span class="hljs-value"><span class="hljs-number">0</span></span>,
  "<span class="hljs-attribute">caption</span>": <span class="hljs-value"><span class="hljs-string">""</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">""</span></span>,
  "<span class="hljs-attribute">num</span>": <span class="hljs-value"><span class="hljs-number">0</span>
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID кампании"</span>
    </span>}</span>,
    "<span class="hljs-attribute">site_id</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID сайта, которому принадлежит кампания"</span>
    </span>}</span>,
    "<span class="hljs-attribute">caption</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Заголовок кампании"</span>
    </span>}</span>,
    "<span class="hljs-attribute">type</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Тип кампании"</span>
    </span>}</span>,
    "<span class="hljs-attribute">num</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Номер кампании в системе статистики"</span>
    </span>}
  </span>}
</span>}</code></pre></div></div></div></div></div><div id="кампании-delete" class="action delete"><div class="action-name"><span class="action-resource">Кампании</span><span class="action-dif">/</span><span class="action-title">Удалить кампанию</span></div><h4 class="action-heading"><a href="#кампании-delete" class="method delete">DELETE</a><div class="code">http://analitics.catkitcms.ru/api/campaigns/{id}</div></h4><div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID кампании</p></td></tr></table></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button">Headers</a></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div></div></div></div></div><div id="кампании-get-2" class="action get"><div class="action-name"><span class="action-resource">Кампании</span><span class="action-dif">/</span><span class="action-title">Общая статистика кампании</span></div><h4 class="action-heading"><a href="#кампании-get-2" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/campaigns/{id}/statistics/summary?{from}=&amp;{to}=</div></h4><p>Возвращает объект с суммой статистик кампании за указанный период.</p>
<div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID кампании</p></td></tr><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>from</td><td><span class="attribute-type">string</span><p>Дата начала периода в формате `YYYY-mm-dd`.</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td>to</td><td><span class="attribute-type">string</span><p>Дата окончания периода (опционально для периода больше 1 дня).</p></td></tr></table></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span></span></td><td width="">cost</td><td><span class="attribute-type">number</span><p>Потраченная сумма(руб.).</p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">views</td><td><span class="attribute-type">number</span><p>Кол-во просмотров рекламных объявлений за период.</p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">clicks</td><td><span class="attribute-type">number</span><p>Кол-во кликов по рекламе за период.</p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">calls</td><td><span class="attribute-type">number</span><p>Кол-во звонков</p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">emails</td><td><span class="attribute-type">number</span><p>Кол-во писем</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">cost</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
  "<span class="hljs-attribute">views</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
  "<span class="hljs-attribute">clicks</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
  "<span class="hljs-attribute">calls</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
  "<span class="hljs-attribute">emails</span>": <span class="hljs-value"><span class="hljs-number">1</span>
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">cost</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Потраченная сумма(руб.)."</span>
    </span>}</span>,
    "<span class="hljs-attribute">views</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во просмотров рекламных объявлений за период."</span>
    </span>}</span>,
    "<span class="hljs-attribute">clicks</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во кликов по рекламе за период."</span>
    </span>}</span>,
    "<span class="hljs-attribute">calls</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во звонков"</span>
    </span>}</span>,
    "<span class="hljs-attribute">emails</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во писем"</span>
    </span>}
  </span>}
</span>}</code></pre></div></div></div></div></div><div id="кампании-get-3" class="action get"><div class="action-name"><span class="action-resource">Кампании</span><span class="action-dif">/</span><span class="action-title">Подробная статистика кампании</span></div><h4 class="action-heading"><a href="#кампании-get-3" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/campaigns/{id}/statistics/details?{from}=&amp;{to}=</div></h4><p>Возвращает массив объектов с суммой почасовых статистик кампании за указанный период.</p>
<div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID кампании</p></td></tr><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>from</td><td><span class="attribute-type">string</span><p>Дата начала периода в формате `YYYY-mm-dd`.</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td>to</td><td><span class="attribute-type">string</span><p>Дата окончания периода (опционально для периода больше 1 дня).</p></td></tr></table></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span class="required"></span></td><td width="">data</td><td><span class="attribute-type">array</span><p></p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">time</td><td><span class="attribute-type">string</span><p>Время, за которое предоставляется стастистика (в формате UTC).</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">statistics</td><td><span class="attribute-type">object</span><p>Объект со статистикой за указанное время</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">cost</td><td><span class="attribute-type">number</span><p>Потраченная сумма(руб.).</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">views</td><td><span class="attribute-type">number</span><p>Кол-во просмотров рекламных объявлений за период.</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">clicks</td><td><span class="attribute-type">number</span><p>Кол-во кликов по рекламе за период.</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">calls</td><td><span class="attribute-type">number</span><p>Кол-во звонков</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">emails</td><td><span class="attribute-type">number</span><p>Кол-во писем</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">[
    {
      "<span class="hljs-attribute">time</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
      "<span class="hljs-attribute">statistics</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">cost</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
        "<span class="hljs-attribute">views</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
        "<span class="hljs-attribute">clicks</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
        "<span class="hljs-attribute">calls</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
        "<span class="hljs-attribute">emails</span>": <span class="hljs-value"><span class="hljs-number">1</span>
      </span>}
    </span>}
  ]
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"array"</span></span>,
      "<span class="hljs-attribute">items</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
        "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">time</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-string">""</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Время, за которое предоставляется стастистика (в формате UTC)."</span>
          </span>}</span>,
          "<span class="hljs-attribute">statistics</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
            "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
              "<span class="hljs-attribute">cost</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-number">0</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Потраченная сумма(руб.)."</span>
              </span>}</span>,
              "<span class="hljs-attribute">views</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-number">0</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во просмотров рекламных объявлений за период."</span>
              </span>}</span>,
              "<span class="hljs-attribute">clicks</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-number">0</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во кликов по рекламе за период."</span>
              </span>}</span>,
              "<span class="hljs-attribute">calls</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-number">0</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во звонков"</span>
              </span>}</span>,
              "<span class="hljs-attribute">emails</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-number">0</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во писем"</span>
              </span>}
            </span>}</span>,
            "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
              <span class="hljs-string">"cost"</span>,
              <span class="hljs-string">"views"</span>,
              <span class="hljs-string">"clicks"</span>,
              <span class="hljs-string">"calls"</span>,
              <span class="hljs-string">"emails"</span>
            ]</span>,
            "<span class="hljs-attribute">additionalProperties</span>": <span class="hljs-value"><span class="hljs-literal">false</span></span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Объект со статистикой за указанное время"</span>
          </span>}
        </span>}</span>,
        "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
          <span class="hljs-string">"time"</span>,
          <span class="hljs-string">"statistics"</span>
        ]</span>,
        "<span class="hljs-attribute">additionalProperties</span>": <span class="hljs-value"><span class="hljs-literal">false</span>
      </span>}
    </span>}
  </span>}</span>,
  "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
    <span class="hljs-string">"data"</span>
  ]
</span>}</code></pre></div></div></div></div></div><div id="кампании-get-4" class="action get"><div class="action-name"><span class="action-resource">Кампании</span><span class="action-dif">/</span><span class="action-title">Текущие настройки биддера</span></div><h4 class="action-heading"><a href="#кампании-get-4" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/campaigns/{id}/bids</div></h4><p>Возвращает список настроек биддера для кампании, а так же информацию о дочерних элементах с индивидуальными настройками биддера. Каждая настройка представляет собой параметры для одного часа (опция <code>hour_num</code>) определенного дня недели (опция <code>day_num</code>), и биддер будет запущен только в это время, в остальные, не указанные, диапазоны биддер выполняться не будет.</p>
<div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID кампании</p></td></tr></table></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span></span></td><td width="">data</td><td><span class="attribute-type">object</span><p></p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">options</td><td><span class="attribute-type">array</span><p></p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">max</td><td><span class="attribute-type">number</span><p>Максимальная ставка</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">position</td><td><span class="attribute-type">string</span><p>Позиция, строка по формуле Pnm, где n - , m -</p><p><b>P11</b></p><p><b>P12</b></p><p><b>P13</b></p><p><b>P14</b></p><p><b>P21</b></p><p><b>P22</b></p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">increment</td><td><span class="attribute-type">number</span><p>Процент завышения ставки</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">active</td><td><span class="attribute-type">boolean</span><p>Статус (включено/выключено)</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">day_num</td><td><span class="attribute-type">number</span><p>Порядковый номер дня недели от 0 (понедельник) до 6, для которого должны применяться настройки</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">hour_num</td><td><span class="attribute-type">number</span><p>Порядковый номер часа от 0 до 23, для которого должны применяться настройки</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">hit</td><td><span class="attribute-type">number</span><p>Показатель попадания ставки в процентах за указанный час. Отражает количество ставок, процент завышения которых не превышал максимальное значение, к общему количеству ставок по кампании. В расчет принимаются только ставки, сделанные по этой группе настроек, - если настройки биддера для кампании были переопределены настройками группы объявлений и/или ключевой фразы, они не учитываются. Значение для группы настроек обновляется при каждом ее использовании биддером.</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">overrides</td><td><span class="attribute-type">object</span><p>список ID дочерних элементов, которые переопределяют настройки кампании</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">ag_groups</td><td><span class="attribute-type">array</span><p>Группы объявлений кампании, для которых указаны другие настройки биддера</p></td></tr><tr><td></td><td></td><td></td><td class="attribute-status"><span></span></td><td width="">id</td><td><span class="attribute-type">number</span><p>ID группы объявлений</p></td></tr><tr><td></td><td></td><td></td><td class="attribute-status"><span></span></td><td width="">name</td><td><span class="attribute-type">string</span><p>Название группы объявлений</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">keywords</td><td><span class="attribute-type">array</span><p>Ключевые фразы кампании, для которых указаны другие настройки биддера</p></td></tr><tr><td></td><td></td><td></td><td class="attribute-status"><span></span></td><td width="">id</td><td><span class="attribute-type">number</span><p>ID ключевой фразы</p></td></tr><tr><td></td><td></td><td></td><td class="attribute-status"><span></span></td><td width="">ad_group_id</td><td><span class="attribute-type">number</span><p>ID группы объявлений, к которой принадлежит ключевая фраза</p></td></tr><tr><td></td><td></td><td></td><td class="attribute-status"><span></span></td><td width="">keyword</td><td><span class="attribute-type">string</span><p>Текст ключевой фразы</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">hit</td><td><span class="attribute-type">number</span><p>Показатель попадания ставки в процентах, рассчитанный при последнем срабатывании биддера для этой кампании.</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">options</span>": <span class="hljs-value">[
      {
        "<span class="hljs-attribute">max</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
        "<span class="hljs-attribute">position</span>": <span class="hljs-value"><span class="hljs-string">"P11"</span></span>,
        "<span class="hljs-attribute">increment</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
        "<span class="hljs-attribute">active</span>": <span class="hljs-value"><span class="hljs-literal">true</span></span>,
        "<span class="hljs-attribute">day_num</span>": <span class="hljs-value"><span class="hljs-number">0</span></span>,
        "<span class="hljs-attribute">hour_num</span>": <span class="hljs-value"><span class="hljs-number">0</span></span>,
        "<span class="hljs-attribute">hit</span>": <span class="hljs-value"><span class="hljs-number">1</span>
      </span>}
    ]</span>,
    "<span class="hljs-attribute">overrides</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">ag_groups</span>": <span class="hljs-value">[
        {
          "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
          "<span class="hljs-attribute">name</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span>
        </span>}
      ]</span>,
      "<span class="hljs-attribute">keywords</span>": <span class="hljs-value">[
        {
          "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
          "<span class="hljs-attribute">ad_group_id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
          "<span class="hljs-attribute">keyword</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span>
        </span>}
      ]
    </span>}</span>,
    "<span class="hljs-attribute">hit</span>": <span class="hljs-value"><span class="hljs-number">1</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
      "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">options</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"array"</span></span>,
          "<span class="hljs-attribute">items</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
            "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
              "<span class="hljs-attribute">max</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-number">0</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Максимальная ставка"</span>
              </span>}</span>,
              "<span class="hljs-attribute">position</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-string">"P11"</span>,
                  <span class="hljs-string">"P12"</span>,
                  <span class="hljs-string">"P13"</span>,
                  <span class="hljs-string">"P14"</span>,
                  <span class="hljs-string">"P21"</span>,
                  <span class="hljs-string">"P22"</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Позиция, строка по формуле Pnm, где n - , m -"</span>
              </span>}</span>,
              "<span class="hljs-attribute">increment</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-number">0</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Процент завышения ставки"</span>
              </span>}</span>,
              "<span class="hljs-attribute">active</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"boolean"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-literal">false</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Статус (включено/выключено)"</span>
              </span>}</span>,
              "<span class="hljs-attribute">day_num</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-number">0</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Порядковый номер дня недели от 0 (понедельник) до 6, для которого должны применяться настройки"</span>
              </span>}</span>,
              "<span class="hljs-attribute">hour_num</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-number">0</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Порядковый номер часа от 0 до 23, для которого должны применяться настройки"</span>
              </span>}</span>,
              "<span class="hljs-attribute">hit</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-number">0</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Показатель попадания ставки в процентах за указанный час. Отражает количество ставок, процент завышения которых не превышал максимальное значение, к общему количеству ставок по кампании. В расчет принимаются только ставки, сделанные по этой группе настроек, - если настройки биддера для кампании были переопределены настройками группы объявлений и/или ключевой фразы, они не учитываются. Значение для группы настроек обновляется при каждом ее использовании биддером."</span>
              </span>}
            </span>}</span>,
            "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
              <span class="hljs-string">"max"</span>,
              <span class="hljs-string">"position"</span>,
              <span class="hljs-string">"increment"</span>,
              <span class="hljs-string">"active"</span>,
              <span class="hljs-string">"day_num"</span>,
              <span class="hljs-string">"hour_num"</span>,
              <span class="hljs-string">"hit"</span>
            ]</span>,
            "<span class="hljs-attribute">additionalProperties</span>": <span class="hljs-value"><span class="hljs-literal">false</span>
          </span>}
        </span>}</span>,
        "<span class="hljs-attribute">overrides</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
          "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">ag_groups</span>": <span class="hljs-value">{
              "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"array"</span></span>,
              "<span class="hljs-attribute">items</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
                "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
                  "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
                    "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                    "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                      <span class="hljs-number">0</span>
                    ]</span>,
                    "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID группы объявлений"</span>
                  </span>}</span>,
                  "<span class="hljs-attribute">name</span>": <span class="hljs-value">{
                    "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
                    "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                      <span class="hljs-string">""</span>
                    ]</span>,
                    "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Название группы объявлений"</span>
                  </span>}
                </span>}</span>,
                "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
                  <span class="hljs-string">"id"</span>,
                  <span class="hljs-string">"name"</span>
                ]</span>,
                "<span class="hljs-attribute">additionalProperties</span>": <span class="hljs-value"><span class="hljs-literal">false</span>
              </span>}</span>,
              "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Группы объявлений кампании, для которых указаны другие настройки биддера"</span>
            </span>}</span>,
            "<span class="hljs-attribute">keywords</span>": <span class="hljs-value">{
              "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"array"</span></span>,
              "<span class="hljs-attribute">items</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
                "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
                  "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
                    "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                    "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                      <span class="hljs-number">0</span>
                    ]</span>,
                    "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID ключевой фразы"</span>
                  </span>}</span>,
                  "<span class="hljs-attribute">ad_group_id</span>": <span class="hljs-value">{
                    "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                    "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                      <span class="hljs-number">0</span>
                    ]</span>,
                    "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID группы объявлений, к которой принадлежит ключевая фраза"</span>
                  </span>}</span>,
                  "<span class="hljs-attribute">keyword</span>": <span class="hljs-value">{
                    "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
                    "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                      <span class="hljs-string">""</span>
                    ]</span>,
                    "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Текст ключевой фразы"</span>
                  </span>}
                </span>}</span>,
                "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
                  <span class="hljs-string">"id"</span>,
                  <span class="hljs-string">"ad_group_id"</span>,
                  <span class="hljs-string">"keyword"</span>
                ]</span>,
                "<span class="hljs-attribute">additionalProperties</span>": <span class="hljs-value"><span class="hljs-literal">false</span>
              </span>}</span>,
              "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Ключевые фразы кампании, для которых указаны другие настройки биддера"</span>
            </span>}
          </span>}</span>,
          "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
            <span class="hljs-string">"ag_groups"</span>,
            <span class="hljs-string">"keywords"</span>
          ]</span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"список ID дочерних элементов, которые переопределяют настройки кампании"</span>
        </span>}</span>,
        "<span class="hljs-attribute">hit</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Показатель попадания ставки в процентах, рассчитанный при последнем срабатывании биддера для этой кампании."</span>
        </span>}
      </span>}</span>,
      "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
        <span class="hljs-string">"options"</span>
      ]
    </span>}
  </span>}
</span>}</code></pre></div></div></div></div></div><div id="кампании-put" class="action put"><div class="action-name"><span class="action-resource">Кампании</span><span class="action-dif">/</span><span class="action-title">Обновить настройки биддера</span></div><h4 class="action-heading"><a href="#кампании-put" class="method put">PUT</a><div class="code">http://analitics.catkitcms.ru/api/campaigns/{id}/bids</div></h4><p>Устанавливает новый набор настроек биддера для кампании. Все прежние диапазоны настроек будут удалены.</p>
<div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID кампании</p></td></tr></table></div><div class="title"><strong>Request</strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span></span></td><td width="">data</td><td><span class="attribute-type">array</span><p></p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">max</td><td><span class="attribute-type">number</span><p>Максимальная ставка</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">position</td><td><span class="attribute-type"></span><p>Позиция, строка по формуле Pnm, где n - , m -</p><p><b>P11</b></p><p><b>P12</b></p><p><b>P13</b></p><p><b>P14</b></p><p><b>P21</b></p><p><b>P22</b></p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">increment</td><td><span class="attribute-type">number</span><p>Процент завышения ставки</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">active</td><td><span class="attribute-type">boolean</span><p>Статус (включено/выключено)</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">day_num</td><td><span class="attribute-type">number</span><p>Порядковый номер дня недели от 0 (понедельник) до 6, для которого должны применяться настройки</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">hour_num</td><td><span class="attribute-type">number</span><p>Порядковый номер часа от 0 до 23, для которого должны применяться настройки</p></td></tr></thead></table></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">[
    {
      "<span class="hljs-attribute">max</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
      "<span class="hljs-attribute">position</span>": <span class="hljs-value"><span class="hljs-string">"P11"</span></span>,
      "<span class="hljs-attribute">increment</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
      "<span class="hljs-attribute">active</span>": <span class="hljs-value"><span class="hljs-literal">true</span></span>,
      "<span class="hljs-attribute">day_num</span>": <span class="hljs-value"><span class="hljs-number">0</span></span>,
      "<span class="hljs-attribute">hour_num</span>": <span class="hljs-value"><span class="hljs-number">0</span>
    </span>}
  ]
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"array"</span></span>,
      "<span class="hljs-attribute">items</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
        "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">max</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Максимальная ставка"</span>
          </span>}</span>,
          "<span class="hljs-attribute">position</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-string">"P11"</span>,
              <span class="hljs-string">"P12"</span>,
              <span class="hljs-string">"P13"</span>,
              <span class="hljs-string">"P14"</span>,
              <span class="hljs-string">"P21"</span>,
              <span class="hljs-string">"P22"</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Позиция, строка по формуле Pnm, где n - , m -"</span>
          </span>}</span>,
          "<span class="hljs-attribute">increment</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Процент завышения ставки"</span>
          </span>}</span>,
          "<span class="hljs-attribute">active</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"boolean"</span></span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Статус (включено/выключено)"</span>
          </span>}</span>,
          "<span class="hljs-attribute">day_num</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Порядковый номер дня недели от 0 (понедельник) до 6, для которого должны применяться настройки"</span>
          </span>}</span>,
          "<span class="hljs-attribute">hour_num</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Порядковый номер часа от 0 до 23, для которого должны применяться настройки"</span>
          </span>}
        </span>}</span>,
        "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
          <span class="hljs-string">"day_num"</span>,
          <span class="hljs-string">"hour_num"</span>
        ]
      </span>}
    </span>}
  </span>}</span>,
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span>
</span>}</code></pre></div></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button">Headers</a></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div></div></div></div></div><div id="кампании-get-5" class="action get"><div class="action-name"><span class="action-resource">Кампании</span><span class="action-dif">/</span><span class="action-title">Список ключевых фраз</span></div><h4 class="action-heading"><a href="#кампании-get-5" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/campaigns/{id}/keywords?{mask}=&amp;{count}=</div></h4><p>Возвращает нужное кол-во ключевых фраз, принадлежащих кампании.</p>
<div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID кампании</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td>mask</td><td><span class="attribute-type">string</span><p>Маска для подбора ключевых фраз. Если маска не указана, ключевые фразы не будут фильтроваться.</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td>count</td><td><span class="attribute-type">number</span><p>Кол-во результатов. Если не указано, будут возвращены все фразы, связанные с этой группой</p></td></tr></table></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span class="required"></span></td><td width="">data</td><td><span class="attribute-type">array</span><p></p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">id</td><td><span class="attribute-type">number</span><p>ID ключевой фразы</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">keyword</td><td><span class="attribute-type">string</span><p>Ключевая фраза</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">[
    {
      "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
      "<span class="hljs-attribute">keyword</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span>
    </span>}
  ]
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"array"</span></span>,
      "<span class="hljs-attribute">items</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
        "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-number">0</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID ключевой фразы"</span>
          </span>}</span>,
          "<span class="hljs-attribute">keyword</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-string">""</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Ключевая фраза"</span>
          </span>}
        </span>}</span>,
        "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
          <span class="hljs-string">"id"</span>,
          <span class="hljs-string">"keyword"</span>
        ]</span>,
        "<span class="hljs-attribute">additionalProperties</span>": <span class="hljs-value"><span class="hljs-literal">false</span>
      </span>}
    </span>}
  </span>}</span>,
  "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
    <span class="hljs-string">"data"</span>
  ]
</span>}</code></pre></div></div></div></div></div><div id="кампании-get-6" class="action get"><div class="action-name"><span class="action-resource">Кампании</span><span class="action-dif">/</span><span class="action-title">Список групп объявлений</span></div><h4 class="action-heading"><a href="#кампании-get-6" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/campaigns/{id}/ad_groups</div></h4><div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID кампании</p></td></tr></table></div><div class="title"><strong>Request</strong></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span class="required"></span></td><td width="">data</td><td><span class="attribute-type">array</span><p></p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">id</td><td><span class="attribute-type">number</span><p>ID группы</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">caption</td><td><span class="attribute-type">string</span><p>Заголовок группы</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">[
    {
      "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
      "<span class="hljs-attribute">caption</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span>
    </span>}
  ]
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"array"</span></span>,
      "<span class="hljs-attribute">items</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
        "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-number">0</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID группы"</span>
          </span>}</span>,
          "<span class="hljs-attribute">caption</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-string">""</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Заголовок группы"</span>
          </span>}
        </span>}</span>,
        "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
          <span class="hljs-string">"id"</span>,
          <span class="hljs-string">"caption"</span>
        ]</span>,
        "<span class="hljs-attribute">additionalProperties</span>": <span class="hljs-value"><span class="hljs-literal">false</span>
      </span>}
    </span>}
  </span>}</span>,
  "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
    <span class="hljs-string">"data"</span>
  ]
</span>}</code></pre></div></div></div></div></div><div id="кампании-get-7" class="action get"><div class="action-name"><span class="action-resource">Кампании</span><span class="action-dif">/</span><span class="action-title">Обновить содержимое кампании</span></div><h4 class="action-heading"><a href="#кампании-get-7" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/campaigns/{id}/sync</div></h4><p>Запускает подгрузку ключевых фраз, объявлений и статусов с серверов поисковых систем немедленно.</p>
<div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID кампании</p></td></tr></table></div><div class="title"><strong>Request</strong></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button">Headers</a></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div></div></div></div></div></div><div id="группы-объявлений" class="resource"><div id="группы-объявлений-get" class="action get"><div class="action-name"><span class="action-resource">Группы объявлений</span><span class="action-dif">/</span><span class="action-title">Список групп</span></div><h4 class="action-heading"><a href="#группы-объявлений-get" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/ad_groups</div></h4><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span class="required"></span></td><td width="">data</td><td><span class="attribute-type">array</span><p></p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">id</td><td><span class="attribute-type">number</span><p>ID группы</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">caption</td><td><span class="attribute-type">string</span><p>Заголовок группы</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">[
    {
      "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
      "<span class="hljs-attribute">caption</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span>
    </span>}
  ]
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"array"</span></span>,
      "<span class="hljs-attribute">items</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
        "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-number">0</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID группы"</span>
          </span>}</span>,
          "<span class="hljs-attribute">caption</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-string">""</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Заголовок группы"</span>
          </span>}
        </span>}</span>,
        "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
          <span class="hljs-string">"id"</span>,
          <span class="hljs-string">"caption"</span>
        ]</span>,
        "<span class="hljs-attribute">additionalProperties</span>": <span class="hljs-value"><span class="hljs-literal">false</span>
      </span>}
    </span>}
  </span>}</span>,
  "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
    <span class="hljs-string">"data"</span>
  ]
</span>}</code></pre></div></div></div></div></div><div id="группы-объявлений-get-1" class="action get"><div class="action-name"><span class="action-resource">Группы объявлений</span><span class="action-dif">/</span><span class="action-title">Детали группы</span></div><h4 class="action-heading"><a href="#группы-объявлений-get-1" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/ad_groups/{id}</div></h4><div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID фразы</p></td></tr></table></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span></span></td><td width=""></td><td><span class="attribute-type">object</span><p></p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">id</td><td><span class="attribute-type">number</span><p>ID группы</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">caption</td><td><span class="attribute-type">string</span><p>Заголовок группы</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">undefined</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
    "<span class="hljs-attribute">caption</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute"></span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
      "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID группы"</span>
        </span>}</span>,
        "<span class="hljs-attribute">caption</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Заголовок группы"</span>
        </span>}
      </span>}
    </span>}
  </span>}
</span>}</code></pre></div></div></div></div></div><div id="группы-объявлений-get-2" class="action get"><div class="action-name"><span class="action-resource">Группы объявлений</span><span class="action-dif">/</span><span class="action-title">Список ключевых фраз</span></div><h4 class="action-heading"><a href="#группы-объявлений-get-2" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/ad_groups/{id}/keywords?{mask}=&amp;{count}=</div></h4><p>Возвращает нужное кол-во ключевых фраз, принадлежащих группе объявлений.</p>
<div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID группы объявлений</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td>mask</td><td><span class="attribute-type">string</span><p>Маска для подбора ключевых фраз. Если маска не указана, ключевые фразы не будут фильтроваться.</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td>count</td><td><span class="attribute-type">number</span><p>Кол-во результатов. Если не указано, будут возвращены все фразы, связанные с этой группой</p></td></tr></table></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span class="required"></span></td><td width="">data</td><td><span class="attribute-type">array</span><p></p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">id</td><td><span class="attribute-type">number</span><p>ID ключевой фразы</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">keyword</td><td><span class="attribute-type">string</span><p>Ключевая фраза</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">[
    {
      "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
      "<span class="hljs-attribute">keyword</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span>
    </span>}
  ]
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"array"</span></span>,
      "<span class="hljs-attribute">items</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
        "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-number">0</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID ключевой фразы"</span>
          </span>}</span>,
          "<span class="hljs-attribute">keyword</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-string">""</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Ключевая фраза"</span>
          </span>}
        </span>}</span>,
        "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
          <span class="hljs-string">"id"</span>,
          <span class="hljs-string">"keyword"</span>
        ]</span>,
        "<span class="hljs-attribute">additionalProperties</span>": <span class="hljs-value"><span class="hljs-literal">false</span>
      </span>}
    </span>}
  </span>}</span>,
  "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
    <span class="hljs-string">"data"</span>
  ]
</span>}</code></pre></div></div></div></div></div><div id="группы-объявлений-get-3" class="action get"><div class="action-name"><span class="action-resource">Группы объявлений</span><span class="action-dif">/</span><span class="action-title">Текущие настройки биддера</span></div><h4 class="action-heading"><a href="#группы-объявлений-get-3" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/ad_groups/{id}/bids</div></h4><div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID группы объявлений</p></td></tr></table></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span></span></td><td width="">data</td><td><span class="attribute-type">object</span><p></p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">options</td><td><span class="attribute-type">array</span><p></p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">max</td><td><span class="attribute-type">number</span><p>Максимальная ставка</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">position</td><td><span class="attribute-type">string</span><p>Позиция, строка по формуле Pnm, где n - , m -</p><p><b>P11</b></p><p><b>P12</b></p><p><b>P13</b></p><p><b>P14</b></p><p><b>P21</b></p><p><b>P22</b></p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">increment</td><td><span class="attribute-type">number</span><p>Процент завышения ставки</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">active</td><td><span class="attribute-type">boolean</span><p>Статус (включено/выключено)</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">day_num</td><td><span class="attribute-type">number</span><p>Порядковый номер дня недели от 0 (понедельник) до 6, для которого должны применяться настройки</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">hour_num</td><td><span class="attribute-type">number</span><p>Порядковый номер часа от 0 до 23, для которого должны применяться настройки</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">overrides</td><td><span class="attribute-type">object</span><p>список ID дочерних элементов, которые переопределяют настройки кампании</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">keywords</td><td><span class="attribute-type">array</span><p>Ключевые фразы кампании, для которых указаны другие настройки биддера</p></td></tr><tr><td></td><td></td><td></td><td class="attribute-status"><span></span></td><td width="">id</td><td><span class="attribute-type">number</span><p>ID ключевой фразы</p></td></tr><tr><td></td><td></td><td></td><td class="attribute-status"><span></span></td><td width="">keyword</td><td><span class="attribute-type">string</span><p>Текст ключевой фразы</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">options</span>": <span class="hljs-value">[
      {
        "<span class="hljs-attribute">max</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
        "<span class="hljs-attribute">position</span>": <span class="hljs-value"><span class="hljs-string">"P11"</span></span>,
        "<span class="hljs-attribute">increment</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
        "<span class="hljs-attribute">active</span>": <span class="hljs-value"><span class="hljs-literal">true</span></span>,
        "<span class="hljs-attribute">day_num</span>": <span class="hljs-value"><span class="hljs-number">0</span></span>,
        "<span class="hljs-attribute">hour_num</span>": <span class="hljs-value"><span class="hljs-number">0</span>
      </span>}
    ]</span>,
    "<span class="hljs-attribute">overrides</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">keywords</span>": <span class="hljs-value">[
        {
          "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
          "<span class="hljs-attribute">keyword</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span>
        </span>}
      ]
    </span>}
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
      "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">options</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"array"</span></span>,
          "<span class="hljs-attribute">items</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
            "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
              "<span class="hljs-attribute">max</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-number">0</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Максимальная ставка"</span>
              </span>}</span>,
              "<span class="hljs-attribute">position</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-string">"P11"</span>,
                  <span class="hljs-string">"P12"</span>,
                  <span class="hljs-string">"P13"</span>,
                  <span class="hljs-string">"P14"</span>,
                  <span class="hljs-string">"P21"</span>,
                  <span class="hljs-string">"P22"</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Позиция, строка по формуле Pnm, где n - , m -"</span>
              </span>}</span>,
              "<span class="hljs-attribute">increment</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-number">0</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Процент завышения ставки"</span>
              </span>}</span>,
              "<span class="hljs-attribute">active</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"boolean"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-literal">false</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Статус (включено/выключено)"</span>
              </span>}</span>,
              "<span class="hljs-attribute">day_num</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-number">0</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Порядковый номер дня недели от 0 (понедельник) до 6, для которого должны применяться настройки"</span>
              </span>}</span>,
              "<span class="hljs-attribute">hour_num</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-number">0</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Порядковый номер часа от 0 до 23, для которого должны применяться настройки"</span>
              </span>}
            </span>}</span>,
            "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
              <span class="hljs-string">"max"</span>,
              <span class="hljs-string">"position"</span>,
              <span class="hljs-string">"increment"</span>,
              <span class="hljs-string">"active"</span>,
              <span class="hljs-string">"day_num"</span>,
              <span class="hljs-string">"hour_num"</span>
            ]</span>,
            "<span class="hljs-attribute">additionalProperties</span>": <span class="hljs-value"><span class="hljs-literal">false</span>
          </span>}
        </span>}</span>,
        "<span class="hljs-attribute">overrides</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
          "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">keywords</span>": <span class="hljs-value">{
              "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"array"</span></span>,
              "<span class="hljs-attribute">items</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
                "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
                  "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
                    "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                    "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                      <span class="hljs-number">0</span>
                    ]</span>,
                    "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID ключевой фразы"</span>
                  </span>}</span>,
                  "<span class="hljs-attribute">keyword</span>": <span class="hljs-value">{
                    "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
                    "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                      <span class="hljs-string">""</span>
                    ]</span>,
                    "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Текст ключевой фразы"</span>
                  </span>}
                </span>}</span>,
                "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
                  <span class="hljs-string">"id"</span>,
                  <span class="hljs-string">"keyword"</span>
                ]</span>,
                "<span class="hljs-attribute">additionalProperties</span>": <span class="hljs-value"><span class="hljs-literal">false</span>
              </span>}</span>,
              "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Ключевые фразы кампании, для которых указаны другие настройки биддера"</span>
            </span>}
          </span>}</span>,
          "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
            <span class="hljs-string">"keywords"</span>
          ]</span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"список ID дочерних элементов, которые переопределяют настройки кампании"</span>
        </span>}
      </span>}</span>,
      "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
        <span class="hljs-string">"options"</span>
      ]
    </span>}
  </span>}
</span>}</code></pre></div></div></div></div></div><div id="группы-объявлений-put" class="action put"><div class="action-name"><span class="action-resource">Группы объявлений</span><span class="action-dif">/</span><span class="action-title">Обновить настройки биддера</span></div><h4 class="action-heading"><a href="#группы-объявлений-put" class="method put">PUT</a><div class="code">http://analitics.catkitcms.ru/api/ad_groups/{id}/bids</div></h4><div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID группы объявлений</p></td></tr></table></div><div class="title"><strong>Request</strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span></span></td><td width="">max</td><td><span class="attribute-type">number</span><p>Максимальная ставка</p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">position</td><td><span class="attribute-type"></span><p>Позиция, строка по формуле Pnm, где n - , m -</p><p><b>P11</b></p><p><b>P12</b></p><p><b>P13</b></p><p><b>P14</b></p><p><b>P21</b></p><p><b>P22</b></p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">increment</td><td><span class="attribute-type">number</span><p>Процент завышения ставки</p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">active</td><td><span class="attribute-type">boolean</span><p>Статус (включено/выключено)</p></td></tr><tr><td class="attribute-status"><span class="required"></span></td><td width="">day_num</td><td><span class="attribute-type">number</span><p>Порядковый номер дня недели от 0 (понедельник) до 6, для которого должны применяться настройки</p></td></tr><tr><td class="attribute-status"><span class="required"></span></td><td width="">hour_num</td><td><span class="attribute-type">number</span><p>Порядковый номер часа от 0 до 23, для которого должны применяться настройки</p></td></tr></thead></table></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">max</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
  "<span class="hljs-attribute">position</span>": <span class="hljs-value"><span class="hljs-string">"P11"</span></span>,
  "<span class="hljs-attribute">increment</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
  "<span class="hljs-attribute">active</span>": <span class="hljs-value"><span class="hljs-literal">true</span></span>,
  "<span class="hljs-attribute">day_num</span>": <span class="hljs-value"><span class="hljs-number">0</span></span>,
  "<span class="hljs-attribute">hour_num</span>": <span class="hljs-value"><span class="hljs-number">0</span>
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">max</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Максимальная ставка"</span>
    </span>}</span>,
    "<span class="hljs-attribute">position</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
        <span class="hljs-string">"P11"</span>,
        <span class="hljs-string">"P12"</span>,
        <span class="hljs-string">"P13"</span>,
        <span class="hljs-string">"P14"</span>,
        <span class="hljs-string">"P21"</span>,
        <span class="hljs-string">"P22"</span>
      ]</span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Позиция, строка по формуле Pnm, где n - , m -"</span>
    </span>}</span>,
    "<span class="hljs-attribute">increment</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Процент завышения ставки"</span>
    </span>}</span>,
    "<span class="hljs-attribute">active</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"boolean"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Статус (включено/выключено)"</span>
    </span>}</span>,
    "<span class="hljs-attribute">day_num</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Порядковый номер дня недели от 0 (понедельник) до 6, для которого должны применяться настройки"</span>
    </span>}</span>,
    "<span class="hljs-attribute">hour_num</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Порядковый номер часа от 0 до 23, для которого должны применяться настройки"</span>
    </span>}
  </span>}</span>,
  "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
    <span class="hljs-string">"day_num"</span>,
    <span class="hljs-string">"hour_num"</span>
  ]</span>,
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span>
</span>}</code></pre></div></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button">Headers</a></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div></div></div></div></div><div id="группы-объявлений-get-4" class="action get"><div class="action-name"><span class="action-resource">Группы объявлений</span><span class="action-dif">/</span><span class="action-title">Общая статистика группы объявлений</span></div><h4 class="action-heading"><a href="#группы-объявлений-get-4" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/ad_groups/{id}/statistics/summary?{from}=&amp;{to}=</div></h4><p>Возвращает объект с суммой статистик всех ключевых фраз, принадлежащих группе объявлений, за указанный период.</p>
<div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID группы объявлений</p></td></tr><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>from</td><td><span class="attribute-type">string</span><p>Дата начала периода в формате `YYYY-mm-dd`.</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td>to</td><td><span class="attribute-type">string</span><p>Дата окончания периода (опционально для периода больше 1 дня).</p></td></tr></table></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span></span></td><td width="">data</td><td><span class="attribute-type">object</span><p></p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">cost</td><td><span class="attribute-type">number</span><p>Потраченная сумма(руб.).</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">views</td><td><span class="attribute-type">number</span><p>Кол-во просмотров за период.</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">clicks</td><td><span class="attribute-type">number</span><p>Кол-во кликов по рекламе за период.</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">calls</td><td><span class="attribute-type">number</span><p>Кол-во звонков с указанным utm_term, принадлежащим этой группе объявлений</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">emails</td><td><span class="attribute-type">number</span><p>Кол-во писем с указанным utm_term, принадлежащим этой группе объявлений</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">cost</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
    "<span class="hljs-attribute">views</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
    "<span class="hljs-attribute">clicks</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
    "<span class="hljs-attribute">calls</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
    "<span class="hljs-attribute">emails</span>": <span class="hljs-value"><span class="hljs-number">1</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
      "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">cost</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Потраченная сумма(руб.)."</span>
        </span>}</span>,
        "<span class="hljs-attribute">views</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во просмотров за период."</span>
        </span>}</span>,
        "<span class="hljs-attribute">clicks</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во кликов по рекламе за период."</span>
        </span>}</span>,
        "<span class="hljs-attribute">calls</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во звонков с указанным utm_term, принадлежащим этой группе объявлений"</span>
        </span>}</span>,
        "<span class="hljs-attribute">emails</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во писем с указанным utm_term, принадлежащим этой группе объявлений"</span>
        </span>}
      </span>}
    </span>}
  </span>}
</span>}</code></pre></div></div></div></div></div></div><div id="ключевые-фразы" class="resource"><p>Из-за большого количества записей нет возможности их динамической подгрузки из ресурсов поисковых систем.  В связи с этим, все методы, возвращающие список ключевых фраз, предоставляют только их снимок, который автоматически синхронизируется в течение некоторого времени. Так же при необходимости можно запустить синхронизацию немедленно, вызвав метод <a href="#%D0%BA%D0%B0%D0%BC%D0%BF%D0%B0%D0%BD%D0%B8%D0%B8-get-8">campaigns::sync</a></p>
<div id="ключевые-фразы-get" class="action get"><div class="action-name"><span class="action-resource">Ключевые фразы</span><span class="action-dif">/</span><span class="action-title">Детали ключевой фразы</span></div><h4 class="action-heading"><a href="#ключевые-фразы-get" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/keywords/{id}</div></h4><div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID фразы</p></td></tr></table></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span class="required"></span></td><td width="">data</td><td><span class="attribute-type">array</span><p></p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">id</td><td><span class="attribute-type">number</span><p>ID ключевой фразы</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">keyword</td><td><span class="attribute-type">string</span><p>Ключевая фраза</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">campaign_id</td><td><span class="attribute-type">number</span><p>ID кампании, которой принадлежит фраза</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">ad_group_id</td><td><span class="attribute-type">number</span><p>ID группы объявлений, которой принадлежит фраза</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">[
    {
      "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
      "<span class="hljs-attribute">keyword</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
      "<span class="hljs-attribute">campaign_id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
      "<span class="hljs-attribute">ad_group_id</span>": <span class="hljs-value"><span class="hljs-number">1</span>
    </span>}
  ]
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"array"</span></span>,
      "<span class="hljs-attribute">items</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
        "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-number">0</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID ключевой фразы"</span>
          </span>}</span>,
          "<span class="hljs-attribute">keyword</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-string">""</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Ключевая фраза"</span>
          </span>}</span>,
          "<span class="hljs-attribute">campaign_id</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-number">0</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID кампании, которой принадлежит фраза"</span>
          </span>}</span>,
          "<span class="hljs-attribute">ad_group_id</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-number">0</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID группы объявлений, которой принадлежит фраза"</span>
          </span>}
        </span>}</span>,
        "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
          <span class="hljs-string">"id"</span>,
          <span class="hljs-string">"keyword"</span>,
          <span class="hljs-string">"campaign_id"</span>,
          <span class="hljs-string">"ad_group_id"</span>
        ]</span>,
        "<span class="hljs-attribute">additionalProperties</span>": <span class="hljs-value"><span class="hljs-literal">false</span>
      </span>}
    </span>}
  </span>}</span>,
  "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
    <span class="hljs-string">"data"</span>
  ]
</span>}</code></pre></div></div></div></div></div><div id="ключевые-фразы-get-1" class="action get"><div class="action-name"><span class="action-resource">Ключевые фразы</span><span class="action-dif">/</span><span class="action-title">Поиск фразы</span></div><h4 class="action-heading"><a href="#ключевые-фразы-get-1" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/keywords/seach?{mask}=&amp;{count}=</div></h4><p>Возвращает заданное количетсво ключевых фраз, подходящих по маске.
Метод медленный, рекомендуется к использованию только в случае, когда неизвестны ID кампании и/или группы объявлений.</p>
<div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>mask</td><td><span class="attribute-type">string</span><p>Маска для подбора ключевых фраз</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td>count</td><td><span class="attribute-type">number</span><p>Кол-во результатов</p></td></tr></table></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span class="required"></span></td><td width="">data</td><td><span class="attribute-type">array</span><p></p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">id</td><td><span class="attribute-type">number</span><p>ID ключевой фразы</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">keyword</td><td><span class="attribute-type">string</span><p>Ключевая фраза</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">campaign_id</td><td><span class="attribute-type">number</span><p>ID кампании, которой принадлежит фраза</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">ad_group_id</td><td><span class="attribute-type">number</span><p>ID группы объявлений, которой принадлежит фраза</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">[
    {
      "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
      "<span class="hljs-attribute">keyword</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
      "<span class="hljs-attribute">campaign_id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
      "<span class="hljs-attribute">ad_group_id</span>": <span class="hljs-value"><span class="hljs-number">1</span>
    </span>}
  ]
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"array"</span></span>,
      "<span class="hljs-attribute">items</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
        "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">id</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-number">0</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID ключевой фразы"</span>
          </span>}</span>,
          "<span class="hljs-attribute">keyword</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-string">""</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Ключевая фраза"</span>
          </span>}</span>,
          "<span class="hljs-attribute">campaign_id</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-number">0</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID кампании, которой принадлежит фраза"</span>
          </span>}</span>,
          "<span class="hljs-attribute">ad_group_id</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
            "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
              <span class="hljs-number">0</span>
            ]</span>,
            "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"ID группы объявлений, которой принадлежит фраза"</span>
          </span>}
        </span>}</span>,
        "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
          <span class="hljs-string">"id"</span>,
          <span class="hljs-string">"keyword"</span>,
          <span class="hljs-string">"campaign_id"</span>,
          <span class="hljs-string">"ad_group_id"</span>
        ]</span>,
        "<span class="hljs-attribute">additionalProperties</span>": <span class="hljs-value"><span class="hljs-literal">false</span>
      </span>}
    </span>}
  </span>}</span>,
  "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
    <span class="hljs-string">"data"</span>
  ]
</span>}</code></pre></div></div></div></div></div><div id="ключевые-фразы-get-2" class="action get"><div class="action-name"><span class="action-resource">Ключевые фразы</span><span class="action-dif">/</span><span class="action-title">Текущие настройки биддера</span></div><h4 class="action-heading"><a href="#ключевые-фразы-get-2" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/keywords/{id}/bids</div></h4><div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID ключевой фразы</p></td></tr></table></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span></span></td><td width="">data</td><td><span class="attribute-type">object</span><p></p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">options</td><td><span class="attribute-type">array</span><p></p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">max</td><td><span class="attribute-type">number</span><p>Максимальная ставка</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">position</td><td><span class="attribute-type">string</span><p>Позиция, строка по формуле Pnm, где n - , m -</p><p><b>P11</b></p><p><b>P12</b></p><p><b>P13</b></p><p><b>P14</b></p><p><b>P21</b></p><p><b>P22</b></p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">increment</td><td><span class="attribute-type">number</span><p>Процент завышения ставки</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">active</td><td><span class="attribute-type">boolean</span><p>Статус (включено/выключено)</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">day_num</td><td><span class="attribute-type">number</span><p>Порядковый номер дня недели от 0 (понедельник) до 6, для которого должны применяться настройки</p></td></tr><tr><td></td><td></td><td class="attribute-status"><span></span></td><td width="">hour_num</td><td><span class="attribute-type">number</span><p>Порядковый номер часа от 0 до 23, для которого должны применяться настройки</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">options</span>": <span class="hljs-value">[
      {
        "<span class="hljs-attribute">max</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
        "<span class="hljs-attribute">position</span>": <span class="hljs-value"><span class="hljs-string">"P11"</span></span>,
        "<span class="hljs-attribute">increment</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
        "<span class="hljs-attribute">active</span>": <span class="hljs-value"><span class="hljs-literal">true</span></span>,
        "<span class="hljs-attribute">day_num</span>": <span class="hljs-value"><span class="hljs-number">0</span></span>,
        "<span class="hljs-attribute">hour_num</span>": <span class="hljs-value"><span class="hljs-number">0</span>
      </span>}
    ]
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
      "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">options</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"array"</span></span>,
          "<span class="hljs-attribute">items</span>": <span class="hljs-value">{
            "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
            "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
              "<span class="hljs-attribute">max</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-number">0</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Максимальная ставка"</span>
              </span>}</span>,
              "<span class="hljs-attribute">position</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-string">"P11"</span>,
                  <span class="hljs-string">"P12"</span>,
                  <span class="hljs-string">"P13"</span>,
                  <span class="hljs-string">"P14"</span>,
                  <span class="hljs-string">"P21"</span>,
                  <span class="hljs-string">"P22"</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Позиция, строка по формуле Pnm, где n - , m -"</span>
              </span>}</span>,
              "<span class="hljs-attribute">increment</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-number">0</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Процент завышения ставки"</span>
              </span>}</span>,
              "<span class="hljs-attribute">active</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"boolean"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-literal">false</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Статус (включено/выключено)"</span>
              </span>}</span>,
              "<span class="hljs-attribute">day_num</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-number">0</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Порядковый номер дня недели от 0 (понедельник) до 6, для которого должны применяться настройки"</span>
              </span>}</span>,
              "<span class="hljs-attribute">hour_num</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
                "<span class="hljs-attribute">enum</span>": <span class="hljs-value">[
                  <span class="hljs-number">0</span>
                ]</span>,
                "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Порядковый номер часа от 0 до 23, для которого должны применяться настройки"</span>
              </span>}
            </span>}</span>,
            "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
              <span class="hljs-string">"max"</span>,
              <span class="hljs-string">"position"</span>,
              <span class="hljs-string">"increment"</span>,
              <span class="hljs-string">"active"</span>,
              <span class="hljs-string">"day_num"</span>,
              <span class="hljs-string">"hour_num"</span>
            ]</span>,
            "<span class="hljs-attribute">additionalProperties</span>": <span class="hljs-value"><span class="hljs-literal">false</span>
          </span>}
        </span>}
      </span>}</span>,
      "<span class="hljs-attribute">required</span>": <span class="hljs-value">[
        <span class="hljs-string">"options"</span>
      ]
    </span>}
  </span>}
</span>}</code></pre></div></div></div></div></div><div id="ключевые-фразы-put" class="action put"><div class="action-name"><span class="action-resource">Ключевые фразы</span><span class="action-dif">/</span><span class="action-title">Обновить настройки биддера</span></div><h4 class="action-heading"><a href="#ключевые-фразы-put" class="method put">PUT</a><div class="code">http://analitics.catkitcms.ru/api/keywords/{id}/bids</div></h4><div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID ключевой фразы</p></td></tr></table></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button">Headers</a></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div></div></div></div></div><div id="ключевые-фразы-get-3" class="action get"><div class="action-name"><span class="action-resource">Ключевые фразы</span><span class="action-dif">/</span><span class="action-title">Общая статистика ключевой фразы</span></div><h4 class="action-heading"><a href="#ключевые-фразы-get-3" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/keywords/{id}/statistics/summary?{from}=&amp;{to}=</div></h4><p>Возвращает объект с суммой статистик для ключевой фразы за указанный период.</p>
<div class="title"><strong>Parameters</strong></div><div class="div"><table class="inner"><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>id</td><td><span class="attribute-type">number</span><p>ID ключевой фразы</p></td></tr><tr><td></td><td class="attribute-status"><span class="required"></span></td><td>from</td><td><span class="attribute-type">string</span><p>Дата начала периода в формате `YYYY-mm-dd`.</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td>to</td><td><span class="attribute-type">string</span><p>Дата окончания периода (опционально для периода больше 1 дня).</p></td></tr></table></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span></span></td><td width="">data</td><td><span class="attribute-type">object</span><p></p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">cost</td><td><span class="attribute-type">number</span><p>Потраченная сумма(руб.).</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">views</td><td><span class="attribute-type">number</span><p>Кол-во просмотров за период.</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">clicks</td><td><span class="attribute-type">number</span><p>Кол-во кликов по рекламе за период.</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">calls</td><td><span class="attribute-type">number</span><p>Кол-во звонков с указанным utm_term для данного ключевого слова</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">emails</td><td><span class="attribute-type">number</span><p>Кол-во писем с указанным utm_term для данного ключевого слова</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">cost</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
    "<span class="hljs-attribute">views</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
    "<span class="hljs-attribute">clicks</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
    "<span class="hljs-attribute">calls</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
    "<span class="hljs-attribute">emails</span>": <span class="hljs-value"><span class="hljs-number">1</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
      "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">cost</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Потраченная сумма(руб.)."</span>
        </span>}</span>,
        "<span class="hljs-attribute">views</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во просмотров за период."</span>
        </span>}</span>,
        "<span class="hljs-attribute">clicks</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во кликов по рекламе за период."</span>
        </span>}</span>,
        "<span class="hljs-attribute">calls</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во звонков с указанным utm_term для данного ключевого слова"</span>
        </span>}</span>,
        "<span class="hljs-attribute">emails</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Кол-во писем с указанным utm_term для данного ключевого слова"</span>
        </span>}
      </span>}
    </span>}
  </span>}
</span>}</code></pre></div></div></div></div></div></div><div id="биддер" class="resource"><div id="биддер-get" class="action get"><div class="action-name"><span class="action-resource">Биддер</span><span class="action-dif">/</span><span class="action-title">Получить информацию о запуске биддера</span></div><h4 class="action-heading"><a href="#биддер-get" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/bidder/info</div></h4><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Headers</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span></span></td><td width="">data</td><td><span class="attribute-type">object</span><p></p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">period</td><td><span class="attribute-type">number</span><p>Интервал запуска биддера в минутах</p></td></tr><tr><td></td><td class="attribute-status"><span></span></td><td width="">last_run</td><td><span class="attribute-type">string</span><p>Время последнего запуска</p></td></tr></thead></table></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">period</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
    "<span class="hljs-attribute">last_run</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span></span>,
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
      "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">period</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Интервал запуска биддера в минутах"</span>
        </span>}</span>,
        "<span class="hljs-attribute">last_run</span>": <span class="hljs-value">{
          "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span></span>,
          "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Время последнего запуска"</span>
        </span>}
      </span>}
    </span>}
  </span>}
</span>}</code></pre></div></div></div></div></div><div id="биддер-put" class="action put"><div class="action-name"><span class="action-resource">Биддер</span><span class="action-dif">/</span><span class="action-title">Обновить настройки запуска биддера</span></div><h4 class="action-heading"><a href="#биддер-put" class="method put">PUT</a><div class="code">http://analitics.catkitcms.ru/api/bidder/period</div></h4><div class="title"><strong>Request</strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span></span></td><td width="">period</td><td><span class="attribute-type">number</span><p>Интервал запуска биддера в минутах</p></td></tr></thead></table></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">period</span>": <span class="hljs-value"><span class="hljs-number">1</span>
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">period</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"number"</span></span>,
      "<span class="hljs-attribute">description</span>": <span class="hljs-value"><span class="hljs-string">"Интервал запуска биддера в минутах"</span>
    </span>}
  </span>}</span>,
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span>
</span>}</code></pre></div></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button">Headers</a></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div></div></div></div></div></div><div id="звонки" class="resource"><div id="звонки-get" class="action get"><div class="action-name"><span class="action-resource">Звонки</span><span class="action-dif">/</span><span class="action-title">Добавление информации о новом звонке</span></div><h4 class="action-heading"><a href="#звонки-get" class="method get">GET</a><div class="code">http://analitics.catkitcms.ru/api/calls/push</div></h4><div class="title"><strong>Request</strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button active">Attributes</a><a data-tab="attributes" class="tab-button">Body</a><a data-tab="attributes" class="tab-button">Schema</a></div><div data-tab="attributes" class="tab active"><table style="width: 100%;"><thead><tr><td class="attribute-status"><span></span></td><td width="">unique</td><td><span class="attribute-type">string</span><p></p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">site</td><td><span class="attribute-type">string</span><p></p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">callerphone</td><td><span class="attribute-type">string</span><p></p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">duration</td><td><span class="attribute-type">string</span><p></p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">reclink</td><td><span class="attribute-type">string</span><p></p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">timestamp</td><td><span class="attribute-type">string</span><p></p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">utm_source</td><td><span class="attribute-type">string</span><p></p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">utm_medium</td><td><span class="attribute-type">string</span><p></p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">utm_campaign</td><td><span class="attribute-type">string</span><p></p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">utm_content</td><td><span class="attribute-type">string</span><p></p></td></tr><tr><td class="attribute-status"><span></span></td><td width="">utm_term</td><td><span class="attribute-type">string</span><p></p></td></tr></thead></table></div><div data-tab="body" class="tab"><pre><code>{
  "<span class="hljs-attribute">unique</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
  "<span class="hljs-attribute">site</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
  "<span class="hljs-attribute">callerphone</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
  "<span class="hljs-attribute">duration</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
  "<span class="hljs-attribute">reclink</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
  "<span class="hljs-attribute">timestamp</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
  "<span class="hljs-attribute">utm_source</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
  "<span class="hljs-attribute">utm_medium</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
  "<span class="hljs-attribute">utm_campaign</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
  "<span class="hljs-attribute">utm_content</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span></span>,
  "<span class="hljs-attribute">utm_term</span>": <span class="hljs-value"><span class="hljs-string">"Hello, world!"</span>
</span>}</code></pre><div style="height: 1px;"></div></div><div data-tab="schema" class="tab"><pre><code>{
  "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"object"</span></span>,
  "<span class="hljs-attribute">properties</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">unique</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span>
    </span>}</span>,
    "<span class="hljs-attribute">site</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span>
    </span>}</span>,
    "<span class="hljs-attribute">callerphone</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span>
    </span>}</span>,
    "<span class="hljs-attribute">duration</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span>
    </span>}</span>,
    "<span class="hljs-attribute">reclink</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span>
    </span>}</span>,
    "<span class="hljs-attribute">timestamp</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span>
    </span>}</span>,
    "<span class="hljs-attribute">utm_source</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span>
    </span>}</span>,
    "<span class="hljs-attribute">utm_medium</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span>
    </span>}</span>,
    "<span class="hljs-attribute">utm_campaign</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span>
    </span>}</span>,
    "<span class="hljs-attribute">utm_content</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span>
    </span>}</span>,
    "<span class="hljs-attribute">utm_term</span>": <span class="hljs-value">{
      "<span class="hljs-attribute">type</span>": <span class="hljs-value"><span class="hljs-string">"string"</span>
    </span>}
  </span>}</span>,
  "<span class="hljs-attribute">$schema</span>": <span class="hljs-value"><span class="hljs-string">"http://json-schema.org/draft-04/schema#"</span>
</span>}</code></pre></div></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong></div><div><div class="inner"><div class="tabs r-tabs"><div class="tabs-menu"><a data-tab="attributes" class="tab-button">Headers</a></div><div data-tab="headers" class="tab"><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div></div></div></div></div></div></div></div></div><p style="text-align: center;" class="text-muted">Generated by&nbsp;<a href="https://github.com/danielgtaylor/aglio" class="aglio">aglio</a>&nbsp;on 16 Dec 2017</p><script>/*
    Determine if a string ends with another string.
*/
function endsWith(str, suffix) {
    return str.indexOf(suffix, str.length - suffix.length) !== -1;
}

/*
    Get a list of direct child elements by class name.
*/
function childrenByClass(element, name) {
    var filtered = [];

    for (var i = 0; i < element.children.length; i++) {
        var child = element.children[i];
        var classNames = child.className.split(' ');
        if (classNames.indexOf(name) !== -1) {
            filtered.push(child);
        }
    }

    return filtered;
}

function closest(el, selector) {
    var matchesFn;

    // find vendor prefix
    ['matches','webkitMatchesSelector','mozMatchesSelector','msMatchesSelector','oMatchesSelector'].some(function(fn) {
        if (typeof document.body[fn] == 'function') {
            matchesFn = fn;
            return true;
        }
        return false;
    })

    var parent;

    // traverse parents
    while (el) {
        parent = el.parentElement;
        if (parent && parent[matchesFn](selector)) {
            return parent;
        }
        el = parent;
    }

    return null;
}

/*
    Get an array [width, height] of the window.
*/
function getWindowDimensions() {
    var w = window,
        d = document,
        e = d.documentElement,
        g = d.body,
        x = w.innerWidth || e.clientWidth || g.clientWidth,
        y = w.innerHeight || e.clientHeight || g.clientHeight;

    return [x, y];
}

/*
    Collapse or show a request/response example.
*/
function toggleCollapseButton(event) {
    var button = event.target;
    var content = button.parentNode.nextSibling;
    var inner = content.children[0];

    if (button.className.indexOf('collapse-button') === -1) {
        // Clicked without hitting the right element?
        return;
    }

    if (content.style.maxHeight && content.style.maxHeight !== '0px') {
        // Currently showing, so let's hide it
        button.className = 'collapse-button';
        content.style.maxHeight = '0px';
    } else {
        // Currently hidden, so let's show it
        button.className = 'collapse-button show';
        content.style.maxHeight = inner.offsetHeight + 12 + 'px';
    }
}

function toggleTabButton(event) {
    var i, index;
    var button = event.target;

    // Get index of the current button.
    var buttons = childrenByClass(button.parentNode, 'tab-button');
    for (i = 0; i < buttons.length; i++) {
        if (buttons[i] === button) {
            index = i;
            button.className = 'tab-button active';
        } else {
            buttons[i].className = 'tab-button';
        }
    }

    // Hide other tabs and show this one.
    var tabs = childrenByClass(button.parentNode.parentNode, 'tab');
    for (i = 0; i < tabs.length; i++) {
        if (i === index) {
            tabs[i].style.display = 'block';
        } else {
            tabs[i].style.display = 'none';
        }
    }

    var content = button.closest('.collapse-content');
    if(content) {
        var inner = content.children[0];
        content.style.maxHeight = inner.offsetHeight + 32 + 'px';
    }

}

document.getElementById('nav-toggle').onclick = toggleNav;

function toggleNav() {
    var nav = document.getElementById('navi');
    if (nav.className == 'show') {
        nav.className = '';
    } else {
        nav.className = 'show';
    }
}

/*
    Collapse or show a navigation menu. It will not be hidden unless it
    is currently selected or `force` has been passed.
*/
function toggleCollapseNav(event, force) {
    var heading = event.target.parentNode;
    var content = heading.nextSibling;
    var inner = content.children[0];

    if (heading.className.indexOf('heading') === -1) {
        // Clicked without hitting the right element?
        return;
    }

    if (content.style.maxHeight && content.style.maxHeight !== '0px') {
        // Currently showing, so let's hide it, but only if this nav item
        // is already selected. This prevents newly selected items from
        // collapsing in an annoying fashion.
        if (force || window.location.hash && endsWith(event.target.href, window.location.hash)) {
            content.style.maxHeight = '0px';
        }
    } else {
        // Currently hidden, so let's show it
        //content.style.maxHeight = inner.offsetHeight + 32 + 'px';
    }
}

/*
    Refresh the page after a live update from the server. This only
    works in live preview mode (using the `--server` parameter).
*/
function refresh(body) {
    document.querySelector('body').className = 'preload';
    document.body.innerHTML = body;

    // Re-initialize the page
    init();

    document.querySelector('body').className = '';
}

/*
    Initialize the interactive functionality of the page.
*/
function init() {
    var i, j;

    // Make collapse buttons clickable
    var buttons = document.querySelectorAll('.collapse-button');
    for (i = 0; i < buttons.length; i++) {
        buttons[i].onclick = toggleCollapseButton;

        // Show by default? Then toggle now.
        if (buttons[i].className.indexOf('show') !== -1) {
            toggleCollapseButton({target: buttons[i].children[0]});
        }
    }

    var responseCodes = document.querySelectorAll('.example-names, .tabs-menu');
    for (i = 0; i < responseCodes.length; i++) {
        var tabButtons = childrenByClass(responseCodes[i], 'tab-button');
        for (j = 0; j < tabButtons.length; j++) {
            tabButtons[j].onclick = toggleTabButton;

            // Show by default?
            if (j === 0) {
                toggleTabButton({target: tabButtons[j]});
            }
        }
    }

    // Make nav items clickable to collapse/expand their content.
    var navItems = document.querySelectorAll('nav .resource-group .heading');
    for (i = 0; i < navItems.length; i++) {
        navItems[i].onclick = toggleCollapseNav;

        // Show all by default
        toggleCollapseNav({target: navItems[i].children[0]});
    }
}

// Initial call to set up buttons
init();

window.onload = function () {
    // autoCollapse();
    // Remove the `preload` class to enable animations
    document.querySelector('body').className = '';
};

</script></body></html>