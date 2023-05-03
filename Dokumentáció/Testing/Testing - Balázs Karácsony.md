# Test Report

## Tester: Balázs Karácsony

### Environment used for testing:

- Code Editor: Visual Studio Code
- Browser: Microsoft Edge
- Testing Framework: Cypress

Upcoming test cases are being reported in this file.  
Testing is going to be divided for several phases (e.g Alpha Testing, Beta Testing).  
During Alpha Testing phase, test cases will be done manually.  
Later on, Cypress will provide automated methods for our test cases. 

## Alpha Testing

| Test ID | Case | Date of Time | Expected Result | Actual Result | Note |
| ----------- | ----------- | ----------- | ----------- | ----------- | ----------- |
| **BK_t001** | Create new meeting - Attempt to create a meeting without filling in the input fields | 2023.04.21 | App warns me about one of the inputs remained incomplete. | Got what I've expected. | Did not find problems related to this matter! |
| **BK_t002** | Create new meeting - Accessing the page as a unauthorized user | 2023.04.21. | The website blocks my access and gives me a warning about being unauthorized for this feature. | The app claims that I have no access to visit the site, and suggest me to go back to the previous page. | Did not find any problems! |
| **BK_t003** | Create new meeting - Attempt to create meeting with the same 'Starting Date' and 'End Date' | 2023.04.21. | Process of meeting creation shouldn't be completed, the site should give me a warning about 'Starting Date' and 'End Date' being the same. | The app creates the meeting with the same start and end dates. | **Found a minor inconvenience!** <br /> Check the [issue #36](https://github.com/gyorkistamas/afp2-2023-tavasz-stopinventing/issues/36) for more info. |
| **BK_t004** | Create new meeting - Creating meeting without participants | 2023.04.21. | App creates the meeting without participants. | Same with the Expected Result. | Since the webapp has features for editing an existing meeting where the scrum master can also add participants to it, it shouldn't be a problem. |
| **BK_t005** | Create new meeting - Creating meeting with starting date being higher than end date | 2023.04.21. | Meeting shouldn't be created, the site should warn me about the start date being inappropiate for the end date. | The site creates the meeting with incorrect appointment details. | **Found a problem!** <br /> See more at: [issue #37](https://github.com/gyorkistamas/afp2-2023-tavasz-stopinventing/issues/37) |
| **BK_t006** | Change user role - Changing user role without selecting a proper action | 2023.04.21 | The webapp interrupts the process and alerts the admin about selecting a specific role in order for the process to succeed; or the selected user's role remains unchanged. | The selected user's role remains unchanged. | No problems found! |
| **BK_t007** | Change user role - Testing, if role change applies to the selected user. | 2023.04.21 | The website changes the selected user's role. | It's in accord with Expected Result | No issues discovered! |
| **BK_t008** | Change user role - Attempt to change other user's role as a non-admin user.  | 2023.04.21 | The web-based application blocks access to this feature because of user unbeing authorized. | Matters written in Expected Result occured. | This feature cannot be triggered by a simple GET request (not that I have a problem with it). <br /> I did not bump into any issues! |
