

To build new image

	docker build .

To tag the image

	docker tag xxxxxxxx docker.viraweb123.ir/prerender:5.6.0

Push the image to server

	docker push docker.viraweb123.ir/prerender:5.6.0

Run image

	docker run  --restart=always -p 3000:3000 docker.viraweb123.ir/prerender:5.6.1