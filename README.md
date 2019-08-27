hello vipin all this is only for you please do the following

1 install git bash in your system

#  crate a work folder(\xampp\htdocs\your_folder) in your system 
# open that folder
# now inside that folder click 'right click' and select "git bash here"


 #set name and email
2 git config --global user.name "FIRST_NAME LAST_NAME"
3 git config --global user.email "MY_NAME@example.com"

# see your name and email
4 git config user.name
5 git config user.email

# initails folder
6 git init

# set repository URL
6 git remote add origin https://github.com/suraj0004/admin-panel.git

# create your local branch
7 git checkout -b backend 

# fetch all data from github (in first tinme it will take few time) 
8 git pull origin master

# now all files in your system , 
9 code .

# in step 9 vs code will open , if you have not vs code open folder manually with our choice editor
# after doing any work follow given commands to save data in github

# this will show you the changes
10 git status

# save changes in your local system
11 git add .

# again see the changes , at this time color change to green
12 git status

# make your file ready to pushing over github
13 git commit -m "comments for your work , make sure you will right something here"

# now save/push data to github
14 git push origin backend

# agian check status, this will show "your branch is up to date" 
15 git status


