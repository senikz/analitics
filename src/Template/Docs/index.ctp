<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Аналитика</title>
		<script src="//unpkg.com/swagger-ui-dist@3/swagger-ui-bundle.js"></script>
		<link rel="stylesheet" href="/css/swagger-material.css" />
		<style>
			.swagger-ui .info hgroup.main a {
				display: none;
			}
			.swagger-ui .info .title small pre {
				padding: 0;
				background: none;
				border: none;
			}
		</style>
	</head>
	<body>
		<div id="swagger-ui"></div>
		<script>
			<?php $docs = scandir(WWW_ROOT . '/docs/');?>
			const ui = SwaggerUIBundle({
				url: "/docs/<?php echo end($docs);?>",
				dom_id: '#swagger-ui',
				presets: [
					SwaggerUIBundle.presets.apis,
				],
			});
			window.ui = ui;
		</script>
	</body>
</html>
