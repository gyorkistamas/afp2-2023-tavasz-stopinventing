# System Specifications

## 1. Goal of the System

The purpose of the system lies within creating and editing scrum meetings, albeit it doesn't despise tracking them as well.  
We might attempt to ease the hardships of scrum masters related to arranging scrum meetings for the other members of a development team.  
According to our schemes, this project is gonna be a dynamic web application written in PHP programming language using Laravel framework alongside with a database system of free choice.

## 2. Project Plan

### 2.1 Project Roles

   * Scrum masters: Nándor Banyik
   * Product owner: Nándor Banyik
   * Business participant: Nándor Banyik
     
### 2.2 Project Staff:

   * Frontend: Balázs Karácsony, József Imre Tabajdi
   * Backend: Tamás Györkis, Gergő Tamás Birinyi
   * Testing: Balázs Karácsony, Tamás Györkis, Gergő Tamás Birinyi, József Imre Tabajdi
     
### 2.3 Schedule:

| Function | Task | Priority | Estimation (in days) | Actual estimation (in days) | Time elapsed (in days) | Estimated time (in days) |
|-------------------------|----------------------------------------|-----------|---------------|------------------------|------------------|---------------------|
| Requirement Specification | Ellaboration | 1 | 3 | 3 | 2 | 3 |             
| Functional Specification | Ellaboration | 1 | 3 | 2 | 3 | 2 |
| System Specification | Ellaboration | 1 | 2 | 3 | 3 | 3 |
| Application | Creating Screenplans | 2 | 3 | 3 | - | 2 |
| Application | Creating the Basic Functionality | 3 | 8 | 8 | - | 8 |
| Application | Creating Prototype | 3 | 8 | 8 | - | 8 |
| Application | Testing | 4 | 2 | 2 | - | 2 |

### 2.4 Milestones:

   * writing of Requirement Specification
   * writing of Functional Specification
   * writing of System Specification
   * designing screenplans
   * demonstration of screenplans
   * preparation of the base app skeleton by Laravel framework
   * starting to code the basic functions
   * completion of basic functionalities
   * conveyance of Prototype
   * fixing errors of Prototype (if there are any)

## 3. Model of Business Processes

### 3.1 Business Participants

   * Normal User (A.K.A. User)
   * Scrum Master
   * Administrator

### 3.2 Business Processes

   - __Basic capabilities:__
     - Creating account with properly given credentials (**Sign Up**), such as Email, Full Name and Password
     - Being able to select the account type (*Normal User* or *Scrum Master*) in the process of Sign Up
     - Logging into an existing account (**Sign In**) with Email and Password
     - Logging out of an account (**Sign Out**)
     - Having a 'Full Name' for simple identification for other users
     - Being able to check the details of your profile
     - Changing password or other user credentials
     - Other means of uploading data to database

   - __Normal User:__
     - Being able to check their upcoming meetings in a calendar-like view
     - Opportunity to book meetings in their calendar
     - Leaving a comment on designated section of a specific meeting
     - Chatting to other members of a specific meeting  

   - __Scrum Master:__
     - Creating meetings, determining their appointments
     - Deleting meetings created by them
     - Inviting others to join created meetings
     - Removing participants from meetings if necessary
     - Being able to take their part in conversations on message boards of meetings as well

   - __Administrator:__
     - Putting a limit on users', whose behaviour is beyond appropiate, access to certain parts of the app (e.g. writing comments) along with notifying HR about the case
     - Being able to access all of the meetings on the website
     - Creating user accounts  

## 4. Requirements

### Functional Requirements

| ID | Module | Name | Description |
| --- | --- | --- | --- |
| FR1 | **Sign In** | Sign In 'Controller' | Code behind Sign In process. |
| FR2 | **Sign In** | Sign In 'View' | GUI part of Sign In. |
| FR3 | **Sign In** | Sign In 'Validator' | Form and other validations on the GUI. |
| FR4 | **Sign Up** | Sign Up 'Controller' | Code executing the process of Sign Up. |
| FR5 | **Sign Up** | Sign Up 'View' | Form of Sign Up. |
| FR6 | **Sign Up** | Sign Up 'Validator' | Validations of Sign Up. |
| FR7 | **Meetings** | Manage Meetings | View where users can check their upcoming meetings. |
| FR8 | **Meetings** | Meeting 'View' | View where users can take a look at the details of a specific meeting. Scrum Master can modify them, if necessary. |
| FR9 | **Meetings** | Edit Meeting | View for Scrum Masters to rework the details of aforementioned Meeting 'View'. |
| FR10 | **Meetings** | Edit Meeting 'Validator' | Form validations of 'Edit Meeting'. |
| FR11 | **Meetings** | Edit Meeting 'Controller' | Working code of process of 'Edit Meeting'. |
| FR12 | **Meeting 'View'** | Message Board | Users can discuss their opinions and nuisances related to details of a specific meeting. |
| FR13 | **User Management** | My Profile View | View where users can have a look at their infos. |
| FR14 | **User Management** | My Profile Edit 'View' | Form where users can change their infos. |
| FR15 | **User Management** | My Profile Edit 'Validator' | Form validations of the Edit form. |
| FR16 | **User Management** | My Profile Edit 'Controller' | Code behind the Profile Editing process. |
| FR17 | **Meetings** | Create Meeting | Form where Scrum master can create a meeting, send Normal Users invites in order for them to join it. |
| FR18 | **Meetings** | Create Meeting 'Validator' | Form validations of 'Create Meeting'. |
| FR19 | **Meetings** | Create Meeting 'Controller' | Lines of code behind 'Create Meeting'. |
| FR20 | **Users** | List of Users | View for Administrator to check the registered Users. |
| FR21 | **Teams** | Create Teams | View where Scrum Masters can assemble Normal Users into a group. |
| FR22 | **Teams** | Manage Teams | View where Scrum Masters can redraft circumstances of their own existing teams. Administrator is able to check all of the existing teams. |

### Non-Functional Requirements

| ID | Name | Description |
| --- | --- | --- |
| NR1 | Authorization | Distinguishing Normal User role from Scrum Master or Administrator role. |
| NR2 | Modern Interface | Providing an interface which fulfils today's expectations and needs. |
| NR3 | Responsive Design | Making the design apt for resolution size of most of the devices. |
| NR4 | User Management | Creating users and selecting their role (Normal User or Scrum Master) in the process of registration. Making users possess options to change data related to them through the app. |
| NR5 | Data Management | Storing essential informations about crucial parts of the web application (such as Users, Meetings, etc.) in database tables in order to sustain the connections among them. |

### Supported Devices

The App is supported for all of the devices used nowadays with a properly working webbrowser app and access to Internet.

## 5. Plan of Functionality

### 5.1 System Participants
- Worker (Normal user)
  - They can join meetings, and leave a comment
- Scrum master
  - They can create or delete meetings, remove participants if necessary.
- Administrator
  - They can create users, and removing their ability to comment too.
  They have access to all meetings

### 5.2 Menu hierachies

## 6. Physical Environment

### Purchased Softwarecomponents and other Third Party Softwares

1. Laravel
2. mySql

### Hardware Topology

+ Server with website services functions and server database services.

### Development Tools

1. Programing languages:
   1. PHP
   2. CSS
   3. HTML
   4. JavaScript
2. Framework:
   1. Laravel
   2. BootStrap
3. Developing enviroment:
   1. VS Code
   2. Notepad++
   3. Linux nano and MidnightCommander
4. Test enviroment
   1. Web browsers
      1. Google Chrome
      2. Opera/Opera GX
      3. Mozila Firefox
      4. Microsoft Edge
      5. Safari

## 7. Architectural Plan

### Webserver

### Database System

### Accessibility of the Program, Ease of Use

## 8. Database Plan

![Database](Pictures/database.png)

## 9. Plan of Implementation

Our team agreed to using the PHP framework Laravel in the development of the web application due to the fact that it provides a simpler method for creating database tables.  
Moreover it makes the work with them facile.  
The program is going to be developed in specific file structure, where each component has its own directory.  
Our members strive to use English language in the code along with entries in documentations, not the mention the messages and notifications that appears on the site.

## 10. Testing Plan

We plan to utilize automatic UI testing. This allows us the periodically test the user interface after each change. This will be done using Cypress, which is an open-source tool designed to test front end web applications.

Every week, the team gathers to check that all task done during the previous week is up to standard and it is completed.

### Test Cases

Below you can see some **example** test cases:

Test No. | Short Description | Expected Result
----------|--------------|---------------|
No.1 | Sign Up | User is successfully able to sign up with given credentials
No. 2 | Login | The user is able to login with correct credentials.
| No. 3 | Create team | A team can be created and people can be added to it by a scrum master
| No. 4 | Create meeting | A meeting is created and user can be invited to it.

## 11. Installation Plan

Physical Installation Plan: 

Our software requires a server to work. The server must be connected to a network so it can be reached, preferably with a gigabit ethernet LAN port. The server components depends on the number of people that's going to use our product.

Software Installation Plan:

- Our software can run on Windows Server or any other Unix-based operating system.
- It requires a software capapble of serving websites to customers (e.g.: IIS, Apache, nginx)
- A databse server must also be configured and made available (e.g.: MySQL server (recommended), PostgreSQL, Oracle SQL, etc.)
- The website must be uploaded to the webserver.
- In the main folder, a '.env' file must be created and configured with at least the following settings:
  - The username, password, address and database name of the database server.
  - The mail provider settings.
  - The app name and url
- The application composer is also required to be installed
- "The composer install" command must be run before first using the application, so the necessary components can be installed and updated.
- After these, the "php artisan migrate --seed" command should be executed, which will create the database and seed it with some basic information.
- Optional: set up a domain name to be used with the website.
- The application is ready to be used.

## 12. Maintenance Plan

- Feedbacks of users and buyer: All feedbacks must be reviewed carefully and if necessarry, changes made to the application.
- Updates
  - Laravel updates checked every 6 months.
  - Composer packages updated every 2-3 months
- Bugs: all reported and discovered bugs must be fixed as soon as possible. The bugs must be tracked on the Github repository.
- New features: all new required features during the life cycle of the software must be discussed with the team, implemented and tested.