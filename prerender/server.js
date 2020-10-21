const prerender = require('prerender');

const forwardHeaders = require('./plugins/forwardHeaders');
const stripHtml = require('./plugins/stripHtml');
const healthcheck = require('./plugins/healthcheck');
const log = require('./plugins/log');
const consoleDebugger = require('./plugins/consoleDebugger');

const options = {
		pageDoneCheckInterval: process.env.PAGE_DONE_CHECK_INTERVAL || 500,
		pageLoadTimeout: process.env.PAGE_LOAD_TIMEOUT || 20000,
		waitAfterLastRequest: process.env.WAIT_AFTER_LAST_REQUEST || 250,
		forwardHeaders: true,
		chromeLocation: '/usr/bin/chromium',
		chromeFlags: [ 
			'--no-sandbox', 
			'--headless', 
			'--disable-gpu', 
			'--remote-debugging-port=9222', 
			'--hide-scrollbars',
			'--ignore-certificate-errors',
			'--blink-settings=imagesEnabled=false'
			],
};
console.log('Starting with options:', options);

const server = prerender(options);

server.use(log);
server.use(healthcheck('_health'));
server.use(forwardHeaders);
server.use(prerender.blockResources());
server.use(prerender.removeScriptTags());
server.use(prerender.httpHeaders());
if (process.env.DEBUG_PAGES) {
	server.use(consoleDebugger);
}
server.use(stripHtml);

server.start();



