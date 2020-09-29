
# `challenge-php-guestbook`

## "Language: PHP"

---

## Learning objectives :computer:

- Store data (in files)
- Convert complex constructs (array/objects) to string representation.
- Deliver a project under a strict deadline
- Deploy on Heroku

This is the repository for the exercise: https://github.com/becodeorg/gnt-yu-3-21/tree/master/Workshops/2.Refactoring-PHP


## The Mission

It is time for our first PHP consolidation challenge!
Let's make a guestbook in PHP.
Every visitor of your page can leave a message that is then saved. Messages are then showed (last message on top) for everybody who visits the page.

Make sure to deploy the site before 17:00 o'clock on Heroku and publish the URL on our usual exercises spreadsheet!

## How to store the messages?
You can store the messages in a file on your system. You can use the brother of file_get_contents() for this: file_put_contents() .

You can either use json_encode() or serialize() to convert your array to a string to store (and viceversa).

## Must-have features

- Posts must have the following attributes:
 - Title
 - Date
 - Content
 - Author name
- Use at least 2 classes: Post & PostLoader
- The messages are sorted from new (top) to old (bottom).
- Make sure the script can handle site defacement attacks: use htmlspecialchars()
- Only show the latest 20 posts.


---

## Tips & Advice :wrench:

+ To keep the code in good shape we recommend separating the view (HTML code) from the PHP code. If you want, you can use the MVC pattern, but it is not required in this exercise.
+ Write your footer and header HTML code in two separate files, and require them in your main view files to avoid repeating HTML code.

## Author :black_nib:
:star: Powered by Ezgi
