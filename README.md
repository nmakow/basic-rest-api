Basic API Usage
---------------

This API allows clients to query and update a database of social media 'posts'.
Each post contains information regarding the post's unique identifier (id), 
author, the text body of the post, the subject of the post, timestamps 
corresponding to the date created and date of the most recent update, and some 
other meta information (note that posts must include the authors email, but 
this information is considered private and not included in the API's response). 
The results of all API calls are returned through HTTP status codes and JSON. 
A description of the API's functionality is provided below:


- GET /posts
	Retrieves all posts.

	Response Codes:
		200 - ok


- GET /posts/{id}
	Retrieves a specific post (by id).

	Response Codes:
		200 - ok
		404 - user not found

- POST /posts
	Creates a new post.
	Must provide the following key-value pairs:
		- author: string containing author's name
		- email: string containing author's email address
		- subject: string containing subject of post
		- body: string containing body of post
	
	Response Codes:
		201 - ok


- PUT /posts/{id}
	Updates a post (by id).

	Response Codes:
		200 - ok
		404 - user not found (bad id)


- DELETE /posts/{id}
	Deletes a post (by id).

	Response Codes:
		200 - ok
		404 - user not found (bad id)