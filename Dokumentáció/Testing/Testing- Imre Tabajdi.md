# Test Report

## Tester: Imre Tabajdi

### Environment used for testing:

- Code Editor: Visual Studio Code
- Browser: Brave (Chromium based)
- Testing Framework: Cypress

## Alpha testing

| Test ID | Case | Date of Time | Expected Result | Actual Result | Note |
| ----------- | ----------- | ----------- | ----------- | ----------- | ----------- |
| **SU_01_IT** | Suspend user as an admin | 2023.04.21 | If the logged in user is admin, and presses the suspend button for the selected user, their isSuspended value changes to "true" | The action is returning success | Works as expected |
| **SU_02_IT** | Suspend user other than admin | 2023.04.21 | If the logged in user is not admin, the 401 error page appears | The 401 error page appears | Didn't find any problem |
| **SU_03_IT** | Suspended user attemps to log in with correct credentials | 2023.04.21 | If the credentials are correct, but the user is suspended, the user gets an error saying <br />'This user has been suspended!' | Gets the expected result | No problems were found |
| **SU_04_IT** | Suspended user attemps to log in with incorrect credentials | 2023.04.21 | If the credentials are incorrect, it doesn't matter whether the user is suspended or not, the error message says 'Invalid credentials!' | Gets the expected result | No issues |
| **MT_01_IT** | Modify the name of the team as scrum master/admin | 2023.04.23 | If the logged in user is at least scrum master, they have the permission to change the meeting's <br />name | Gets the expected result | No issues |
| **MT_02_IT** | Modify the name of the team as simple user | 2023.04.23 | If the logged in user is a simple user, they won't have permission to the site, and gets redirected to page <br />401 | Gets the expected result | No issues |
| **MT_03_IT** | Attempt to remove participant from team | 2023.04.23 | If we remove the selected participant from the team, they won't be the member of that team anymore, and will <br />get a notification. | The site gives an error 'The team name field is required.' | **Found a problem**  For more info, check the [issue #43](https://github.com/gyorkistamas/afp2-2023-tavasz-stopinventing/issues/43) |
| **MT_04_IT** | Attempt to add participant to the team | 2023.04.23 | Add a new team member to the team | Adds the member but shows an unexpected error saying 'Team cant be  <br/>modified!' | **Found a problem** For more info check the [issue #44](https://github.com/gyorkistamas/afp2-2023-tavasz-stopinventing/issues/44) |
| **MT_05_IT** | Attempt to delete the team | 2023.04.23 | Deleting meeting | Gives a TypeError | **Will be fixed soon** Check [issue #45](https://github.com/gyorkistamas/afp2-2023-tavasz-stopinventing/issues/45) |
| **MM_01_IT** | Attempt to remove participant from meeting | 2023.04.23 | Removes team member | Gets the expected result | No issues were hiding |
| **MM_02_IT** | Attempt to modify name/start date/end date of the meeting | 2023.04.23 | Updates the values | Update is only happening if the description field isn't empty | **TODO** Check [issue #46](https://github.com/gyorkistamas/afp2-2023-tavasz-stopinventing/issues/46) |

### Footnotes

SU: Suspend User  <br />
MT: Manage Teams <br />
MM: Manage Meeting