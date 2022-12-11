# Blogging System : A total Content Management System (C.M.S), also contains an Admin Panel which controls the whole dynamic process of this monolithic project.

### What is a Blogging Systems
> Are broadcast-style communications systems that enable authors to publish articles, opinions or product reviews (known as posts), which can be delivered through stand-alone websites, email, feed syndications systems and social networks. According to https://gartner.com

<p style='justify-content:center'> Or</p>

> Blogging refers to writing, photography, and other media that's self-published online

### What is a Content Management System (C.M.S)
> A content management system is a software application that allows you to create and deliver digital content. A CMS lets you easily edit your digital experiences and then publish that experience out to the web and other digital channels. According to https://business.adobe.com

### Abbreviations which will be used and their meaning :
> DB - Database
> CRUD (Create Read Update Delete) system

### How this project Admin Panel Functions
1. It has a Dashboard that shows the list below <br>
![Dashboard_page](https://user-images.githubusercontent.com/60825409/198424176-8430f623-07d2-4a40-99ac-0e5b50619178.png)


i. It contains a Post Section <br>

![Dashboard_post_view_post_page](https://user-images.githubusercontent.com/60825409/198424466-51af72f0-fd6c-44e5-b415-a0a33795d721.png)

![post_view2](https://user-images.githubusercontent.com/60825409/198424569-044e3968-9b98-44c2-9067-403b03815e64.png)

![post_add_postpage](https://user-images.githubusercontent.com/60825409/198424640-51627bfc-fd8e-4718-be81-38ba1028e80e.png)

![add_postpage2](https://user-images.githubusercontent.com/60825409/198424748-4f069c7c-e894-4482-8291-4d9bf702050c.png)

ii. It contains a Category Section

![CategoriesPg](https://user-images.githubusercontent.com/60825409/198425796-cee247ad-5dc0-4390-bc8a-c719a7635cc5.png)

iii. It contains also a Comment Section

![CommentsPg](https://user-images.githubusercontent.com/60825409/198426020-b619bfbe-e1f8-4d46-baaf-fab172d6d9cc.png)

iv. It also contains the User Section

![Users_View_userPg](https://user-images.githubusercontent.com/60825409/198426709-d6b2220b-109f-4cb5-9f05-49c4767ee8cd.png)

![User_Add_newUserPg](https://user-images.githubusercontent.com/60825409/198426760-0c2c11d9-b2ba-4e39-bd43-cdf7a0786bde.png)


## Well Under the Dashboard are 4 subsections, which I have listed above with their Images.
1. Post Section.
2. Comments Section.
3. Users Section.
4. Categories Section.


# Tools needed to get this Project Up and running are:
1. Browser, preferably - google chrome
 
![chrome](https://user-images.githubusercontent.com/60825409/198438126-a4cf1a98-97c0-475d-9ab0-3f97f4863695.jpg)

2. Xampp Control Panel 

![xampp-control-panel](https://user-images.githubusercontent.com/60825409/198438315-4804ef52-b644-47fd-b835-5c529501cbac.jpg)

![xampp-when Opened](https://user-images.githubusercontent.com/60825409/198438929-1e5375d5-4eac-47be-887e-518ec893adc6.png)

3. Text Editor, prefably - Visual studio code 

![Vs code](https://user-images.githubusercontent.com/60825409/198439471-0749f40d-d870-4ff9-93af-08ae0adbe7f5.jpg)

![Vs Code When Open](https://user-images.githubusercontent.com/60825409/198439496-f96e5ebf-1a22-4eb1-a7b9-9786100fb521.png)

# Steps to get the whole process started. 
1. Open the Xampp control panel you downloaded, after installing it on local machine.

![xampp-when Opened](https://user-images.githubusercontent.com/60825409/198439565-0ee3617d-dea8-4c43-a975-0ff506cdfd88.png)

2. click `Apache : Start`
3. click `MySQL : Start` 

4. Download and install Visual Studio Code 
5. Open or better still, run the visual studio code 

![Vs Code When Open](https://user-images.githubusercontent.com/60825409/198439676-a1322067-0252-4d64-b215-8e3c0f90b621.png)

6. clone this repository by running `git clone https://github.com/Alpheus-godswill1/blogging_system3.git `

# Extensions that eased the process using VS code text editor on this project.
1. Bracket pair Coloriser

2. Emmet Live 

3. Github themes

4. Vs Code great icons

# Let's Start from the Backend to the Front End i.e from the Admin Panel to the Front display Page.

* As I said earlier it contains several sections, which I listed above. 
* So I am going to explain, how I built each section, what bugs I encountered, you will get to know the mindset behind each section and how I moved from one line of code to completion of this amazing project.

# Remember We are discussing the Admin Section.
## Section 1 (CREATE ACCOUNT/SIGN UP PAGE, WHEN USER DON'T HAVE AN ACCOUNT WITH THIS ORGANISATION)
1. Before entering any website as a contributor or an editor or an admin or what ever role a person plays, firstly, you must have a record, or an account with them so they can know you properly. So note no random user can just publish content on an organisation website, it must go through a process.
> There is normally a connection to the database first in any PHP built section, to ensure data communication is gotten properly.
> The connection to the DB must be working properly before any checking and validation of the field like the password, username, email etc, is done using the script below.

![Creat user front page ](https://user-images.githubusercontent.com/60825409/198446564-a6145101-1d5d-493d-a796-588b5ffaa24e.png)

![create user html page ](https://user-images.githubusercontent.com/60825409/198446790-5531bd9f-2658-4e59-bd9f-f196ff6258fc.png)

![create user html page2](https://user-images.githubusercontent.com/60825409/198446982-6b6bdc62-5d95-41d7-ba32-ef446e1ca975.png)


![create user script PHP1](https://user-images.githubusercontent.com/60825409/198447045-48522f9e-874b-430b-b2db-85550225c281.png)

![create user script PHP2](https://user-images.githubusercontent.com/60825409/198447241-7a98f3d3-fcf9-4dc3-9fc0-a255246bcaed.png)

![create user script PHP3](https://user-images.githubusercontent.com/60825409/198447276-6c04bc61-911e-4498-b020-f4b3b0b93842.png)

# Section 2 (LOGIN PAGE, WHEN USER HAVE AN ACCOUNT WITH THIS ORGANISATION):
> Here can only be accessed if the user have an account created with the ORGANISATION.

> This occurs by a process, data stored in the database is taken and compared to the data inserted into the field by the user to see if the data corresponds, else an error message is activated by a script.

![Login Frontpage](https://user-images.githubusercontent.com/60825409/206892668-01eb7a7d-f83f-4a60-9ad7-27c35eaabe3c.png)

> HTML5 / CSS3 tags below

![login front page html](https://user-images.githubusercontent.com/60825409/206892719-0acb239c-75fc-43ec-a3ac-57a148092836.png)

![login frontpage 2 pics](https://user-images.githubusercontent.com/60825409/206892726-16e0c4b6-340a-4dd9-a314-b3093e1ec4b3.png)

> PHP script that takes data from HTML/CSS page, validates them and stores them in DB

![Login script PHP1](https://user-images.githubusercontent.com/60825409/206892783-b1501c52-505f-48a0-90f0-36a4a16c83cf.png)

![Login script PHP2](https://user-images.githubusercontent.com/60825409/206892790-24a18b94-fe01-4a63-8c18-cc95cd740d30.png)

## SECTION 3 :
## How DATA is sent and gotten for the POST SECTION in the Admin Panel :

> Like I said earlier there is a connection to the DB first before anything is carried out.

1. Using a CRUD system.

1i. Post are sent to the DB tables (post)

![post_add_postpage](https://user-images.githubusercontent.com/60825409/206925597-b31cd593-d542-4bbc-b276-79f371d882c5.png)

![add_postpage2](https://user-images.githubusercontent.com/60825409/206925600-31c6d64f-d932-402d-9964-927c35837661.png)

> HTML tags and PHP scripts for the image above to send post to DB.

![add_post](https://user-images.githubusercontent.com/60825409/206925633-e8b6db1a-82b4-4dd3-b828-b301c162a76b.png)

![add_post2](https://user-images.githubusercontent.com/60825409/206925638-94f6f052-2ef3-49c2-b3ac-d8e914a0d2e6.png)

![post_Dashboard1](https://user-images.githubusercontent.com/60825409/206924889-4f2509bb-0683-4509-a525-82c29f822a1e.png)

![Dashboard_post_view_post_page](https://user-images.githubusercontent.com/60825409/206924893-d63fa4c6-2f05-40ee-a83f-30b64f5419a6.png)

> For the HTML header of the Table

![Post header](https://user-images.githubusercontent.com/60825409/206924963-9cd625ec-dd65-4f62-a980-f2c73f1cf2cc.png)

> For the edit button feature 

![Edit_Post](https://user-images.githubusercontent.com/60825409/206924972-a9c15768-de9f-4f14-94e1-d39f25cc54b0.png)

![edit_post2](https://user-images.githubusercontent.com/60825409/206924976-732d0d2b-c697-426e-8532-187eb6dca0f1.png)

![edit_post3](https://user-images.githubusercontent.com/60825409/206924979-eded4269-1f2e-4e36-8f10-752ebc01a428.png)

![edit_post4](https://user-images.githubusercontent.com/60825409/206924986-d63c2366-ce21-4744-9189-b2794e776217.png)

> For the change status feature 

![change_to_publish_or_draft](https://user-images.githubusercontent.com/60825409/206925005-bfcd67d0-f11b-463c-a08f-6b1792f16cb9.png)

## SECTION 4 :
## This section is for the category of the post displayed on the front page, but this is also stored and displayed in DB and Admin Panel, it all depends on what the user(Admin, editor, copywriter) etc, is trying to do, e.g (Tech, finance, Health, Food ) etc.

![CategoriesPg](https://user-images.githubusercontent.com/60825409/206925266-56673896-4ccf-4b1c-9549-14c5649337b1.png)

> This is to display category which the content creator selected :

![Display_Category1](https://user-images.githubusercontent.com/60825409/206925272-72d27a89-c0e5-41cf-a4b1-4720d6f3ab1d.png)

> Delete Feature: this is to delete category dynamically if the user wishes .

![Delete_category1](https://user-images.githubusercontent.com/60825409/206925347-527fac61-32d9-4129-9bfd-f9e2c27ebc75.png)
