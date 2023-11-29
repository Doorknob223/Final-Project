# Final-Project
My Final Project
11-28-2023

By Connor Gardner

For this project I decided that I wanted to make an image board that alowed users to upload an image of their chooseing as well as add a caption to the image.

Login Page
![Screenshot (13)](https://github.com/Doorknob223/Final-Project/assets/104516891/a30998c3-e04b-462b-b6b7-6e24477a0dca)

When the home page is first opened, it immediately opens a session and checks to see if there is a value in the 'username' catagory.
this is treated as a user being logged in or not, if the 'username' is empty it send to the login screen, this is the first thing that happens on all pages on the site,
with the exception of the login page, and the registration page, so the user can log in or make an account.
If the user does not have and account they can get to the registration page by pressing the large button at the bottom of the screen.

Registration page
![Screenshot (14)](https://github.com/Doorknob223/Final-Project/assets/104516891/06d7a4cc-bd92-4aaf-946f-184f0eae5b8b)

After the user either logs on or makes an acocunt, they immediately get sent to the homepage.
Here there is a breif summary of what the site is and what users can do.
I also included a 'Rules' section so that the users can know the rules of the image board.
At the top of the screen there is a moving bar that follows the screen if the user scrolls down.
This bar has three (3) buttons that allows the user to navigate the site, from left to right those buttons are,
'Image Board' - This takes the user to the image board page, where the main content of the site is.
'Rules' - This takes the user to the home page, there they can read the rules and about the site.
'Logout' - This alows the user to end the session and logout of their account

Home page (1)
![Screenshot (15)](https://github.com/Doorknob223/Final-Project/assets/104516891/b08b66a5-9394-446d-9f7f-d169dd5f8ee1)

At the bottom of the homepage it tells the user who they are logged in as, as well as a copywrite notice
These are at the bottom of every page on the site
in the images ill be showing, ill be logged in as the user 'Mike'

Home Page (2)
![Screenshot (16)](https://github.com/Doorknob223/Final-Project/assets/104516891/298389c8-0263-498b-ad1a-a704e8b1da03)

Moving on to the 'Image Board' Here we can see every post that users of the site have ever uploaded in a grid consisting of rows of 4 images.
These photos are orgaized from most recent, to oldest.
Underneath the photo there is a small description box where the user can see who upload the image above.
At the top middle of the page there is an option to upload a file and add a caption to that file.
In preperation for the presentation I have gone ahead and upload multiple images from several accounts, they will allow me to demonstrate the full capabilities of the site.

Image Board
![Screenshot (17)](https://github.com/Doorknob223/Final-Project/assets/104516891/cd7af3c9-bcb3-4f5d-9820-c5f1603589f5)

If the user clicks on an image it will take them to a 'template' page where they can see an enlarged version of the image, 
as well as the caption that the poster placed on the image.
They can also see the 'imageID' aka what number post it was in the history of the site.

Template
![Screenshot (18)](https://github.com/Doorknob223/Final-Project/assets/104516891/90dfabdc-50b0-4264-9da0-edb5292a4377)

There options under the post. Depending on who posted the image and who is logged in looking at it, the number of options may increase.
In this example, the user Mike is looking at a photo that was not uploaded by them, so they only get one option 'User History'.
the user history button allows the current user to view all of the past post of the image uploaders, again in order of newest to oldest.
This shows a similar page to the image board, with the notable diference being a lack of upload option, the main header showing the username of ther posters you are looking at,
and instead of showing the uploader in the image description, it instead shows the caption.

User History
![Screenshot (19)](https://github.com/Doorknob223/Final-Project/assets/104516891/69483e4f-30f8-428a-9529-4dce2fe741dd)

Going back to the 'template' page, if the user that is logged on IS the user that uploaded the image, it allows them to do several things with the image.
The new options are the options to update the image, or to delete it entirely.
The edit button takes them to an edit page that allows the user to upload a new image and write a new caption.
This only edits the original post 'filename' and 'caption' catagories, so it still uses the old imageID and does NOT create a new post.
The delete button completely deletes the post from the 'images' table, removing the post from the site.

Template (Logged Users Post)
![Screenshot (20)](https://github.com/Doorknob223/Final-Project/assets/104516891/3e7baaef-9c03-4eb9-80f6-42f72fb298e9)

And finally there is additional options for a user if the detected user is 'Admin', giving them more options on the template page.
'Admin' can edit or delete any post on the site, even if they did not post them.
They can also see the userID of the person who uploaded it, so they can check the 'registration' Table.
And finaly they are the only person that gets to the 'BAN USER' button.
The 'BAN USER' button does multiple things in one click,
First it adds the username to the 'banned' table, this prevents the banned user from logging in, as well as preventing anyone from taking the previously banned username.
Second it removes all of the users upload photos from the 'images' table, deleting ALL of their post off the site.
And finally it removes the user from the 'registration' table.

Template (Admin Case)
![Screenshot (21)](https://github.com/Doorknob223/Final-Project/assets/104516891/0c016c01-d83c-44b4-ac50-583d9c2d6d36)

And those are all of the pages of the website, all other pieces of code should imediately kick the user to either the login screen or the homepage when their job is done.
I also provided explanations of how the code works and what segments of code do in the files them selves, so please look at the comments in the code for a more detailed explination.

To see the whole github post please visit https://github.com/Doorknob223/Final-Project/tree/main (this is my account)
