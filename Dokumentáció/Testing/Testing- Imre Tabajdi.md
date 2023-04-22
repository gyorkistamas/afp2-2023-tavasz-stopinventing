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
| **SU_03_IT** | Suspended user attemps to log in with correct credentials | 2023.04.21 | If the credentials are correct, but the user is suspended, the user gets an error message
saying 'This user has been suspended!' | Gets the expected result | No problems were found |
| **SU_04_IT** | Suspended user attemps to log in with incorrect credentials | 2023.04.21 | If the credentials are incorrect, it doesn't matter whether the user is suspended or not, the error message says 'Invalid credentials!' | Gets the expected result | No issues |