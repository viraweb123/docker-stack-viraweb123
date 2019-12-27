/**
 * Adds some links into the page
 */
module.exports = {
		pageLoaded: (req, res, next) => {
			if (!req.prerender.content || req.prerender.renderType != 'html') {
				return next();
			}

			var content = req.prerender.content.toString();
			
			var fs = require('fs');
			var links = fs.readFileSync('./links.html', "utf8");
			
			content = content.replace('</body>', links + '</body>');
			req.prerender.content = content;
			next();
		}
};