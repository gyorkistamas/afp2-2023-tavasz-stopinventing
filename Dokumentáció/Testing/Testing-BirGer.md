# Alfa testing

## **Date:** 2023.04.21

### Login

| # | Test case | Expected result | Actual result | Comment |
|------------|------------|---------------|--------------------|------------|
| T_001 | Trying to login without all information | The user is notified about the missing fields | The expected result occurs | No problem |
| T_002 | Trying to login without Eamil | The user is notified about the missing field | The expected result occurs | No problem |
| T_003 | Trying to login without password | The user is notified about the missing field | The expected result occurs | No problem |
| T_004 | Trying to login wrong Email | The user is notified about invalid information | The expected result occurs | No problem |
| T_005 | Trying to login wrong password | The user is notified about invalid information | The expected result occurs | No problem |
| T_006 | Trying to login correctly | The user is loged in | The expected result occurs | No problem |

### Sing-up

| # | Test case | Expected result | Actual result | Comment |
|------------|------------|---------------|--------------------|------------|
| T_001 | Trying to sign up without any mandatory information | The user is notified about the missing fields | The expected result occurs | No problem |
| T_002 | Trying to sign up with non-matching password | The user is notified about the not matching password | The expected result occurs | No problem |
| T_003 | Trying to sign up without password requirements | The user is notified about incorrect password requirements | The expected result occurs | No problem |
| T_004 | Trying to sign up correctly without changed profile picture | The user is singed up | The expected result occurs | No problem |
| T_005 | Trying to sign up correctly with changed profile picture | The user is singed up | The expected result occurs | No problem |
