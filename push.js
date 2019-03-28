var GitHub = require('github-api');

// Creates a new instance of the Github object exposed by Github.js
var github = new Github({
  username: 'YOUR_USERNAME',
  password: 'YOUR_PASSWORD',
  auth: 'basic'
});

// Creates an object representing the repository you want to work with
var repository = github.getRepo('A_USERNAME', 'A_REPOSITORY_NAME');

// Creates a new file (or updates it if the file already exists)
// with the content provided
repository.write(
   'BRANCH_NAME', // e.g. 'master'
   'path/to/file', // e.g. 'blog/index.md'
   'THE_CONTENT', // e.g. 'Hello world, this is my new content'
   'YOUR_COMMIT_MESSAGE', // e.g. 'Created new index'
   function(err) {}
);
