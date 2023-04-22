# Alfa testing

## **Date:** 2023.04.20
### New team creation, comment on meeting

| # | Test case | Expected result | Actual result | Comment |
|------------|------------|---------------|--------------------|------------|
| T_001 | Trying to create team without logging in | The website tells the user it does not have the privilage to do so. | The sites throws an error. | [To be fixed](https://github.com/gyorkistamas/afp2-2023-tavasz-stopinventing/issues/35) |
| T_002 | Trying to create team with normal account.  | The website tells the user it does not have the privilage to do so. | The expected result occurs. | No problem. |
| T_003 | Trying to create a team with a scrum master account. | The team is created. | The expected result occurs. | No problem. |
| T_004 | Trying to create a team with an admin account. | The team is created. | The expected result occurs. | No problem. |
| T_005 | Trying to create a team with a name that already exists. | The team is not created. | The expected result occurs. | No problem. |
| T_006 | Not filling in the team name. | The team is not created. | The expected result occurs, the user is notified of the missing value. | No problem. |
| T_007 | A comment is added to a meeting. | The comment is recorded. | The expected result occurs. | No problem. |
| T_008 | The comment field is left empty. | The user is notified about the missing message. | The expected result occurs. | No problem. |