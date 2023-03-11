# Requirement specification

## 1. Overview

Our team was tasked with creating a web-based application that allows the buyer to create scrum meetings. The buyer has tried many different applications, but it was not satisfied with them. They either lacked a certain feature, or it was over complicated and it took too long to achieve what they wanted to do. For this reason, they asked us to create a platform, designed specifically to plan and create scrum meetings, send invites to these meetings and a suite of supporting features to help with the organization.

## 2. Current situation

The buyer currently uses Google calendar system to organise the meetings, and to send out invitations to these. This poses some problem, mainly that not everyone uses the Google ecosystem, and they sometimes experience bugs and problems with these invites. Also, they have no reliable way to see who acknowledged the invite, or if they've seen the invite at all. On top of these, the meeting organizer has to find all the participant's email address, and type them in one by one. This takes a long time to do every day.

## 3. Objectives

The project goal is a website/web application, which is a compact team management application package for the buyer. The system was available in web browser and mobile web browser. During the registration, the user may decide what role to play in the team. The application is designed to be clean and simple for easy usage. The system provides an opportunity to make online scrum meetings and synchronized plan calendar with the team. In another tab, the site or submenu has a task tracker just like Trello, and progress monitoring with different possibilities. Only the team leader can add or remove team members in the application.

## 4. Model of current business processes

- The scrum master retrieves the team member's email addresses.
- They open Google Calendar and create a new meeting.
- They specify a time and date, and enter the participant's email addresses.
- They send out the invites.
- The participants respond by email if they can't attend.
- The scrum master then re-schedules the meeting, if they have to.
- They might need to send out another notification about the changes.
- The last three point might repeat numerous times.

## 5. Model of demanded business processes

## 6. Request list

| Id | Module | Name | Description |
| :---: | --- | --- | --- |
| K1 | Access | Login Screen | The user's email address/username and password are required to log in. If the email address/username or password is not correct, the user will receive an error message. |
| K2 | Access | Registration | The user enters their username, email address, and password to register. The password is stored encrypted in the database. If any of this information is missing, does not meet the requirements, or is already registered with it once the username or/and the email, the system will notify the user. |
| K3 | Access | Access levels | - Normal user<br> - Scrum master<br> - Administrator |
| K4 | Modification | User modify | The user can change their username. |
| K5 | Modification | Password modify | The user can change their password. To do this, the old and new passwords must be needed, and confirm the new ones. |
| K6 | Modification | Email modify | The user can change their email address. |
| K7 | Modification | Forgot your username or password | If the user has forgotten their username or password then the user requests an automated email with in the instructions. |
| K8 | Interface | Calendar | Users can track the event here. |
| K9 | Interface | Online meeting | The "Team"/"Group" holds meetings. |
| K10 | Interface | Task list | User can manage their tasks here and request or decline another task. |
| K11 | Interface | Progression | Users can track the progression here. |
| K12 | Interface | Login | Users can log in here to the application. |
| K13 | Interface | Messages | Users can send messages to each other. And the notifications messages arrive here too. |

## 7. Glossary

- scrum: a framework for project management commonly used in software development
- ecosystem: a collection of tools, programs, devices designed to co-operate with each other
