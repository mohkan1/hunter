//import Github from 'github.js';

// Creates a new instance of the Github object exposed by Github.js
var github = new Github({
  username: 'mohkan1',
  password: 'mohkan11399',
  auth: 'basic'
});

// Creates an object representing the repository you want to work with
var repository = github.getRepo('mohkan1', 'code');

// Creates a new file (or updates it if the file already exists)
// with the content provided
repository.writeFile(
   'master', // e.g. 'master'
   'master', // e.g. 'blog/index.md'
   'THE_CONTENT', // e.g. 'Hello world, this is my new content'
   'YOUR_COMMIT_MESSAGE', // e.g. 'Created new index'
   function(err) {}
);
