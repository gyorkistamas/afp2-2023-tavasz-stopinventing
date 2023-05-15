describe('Test the meeting edit', () => {
  before(() => {
    cy.refreshDatabase();
    cy.seed();
  });

  Cypress.Commands.add('AccessCreateNewMeeting', (email, pw) => {
    cy.visit('/');
    cy.get('#email').type(email);
    cy.get('#password').type(pw);
    cy.get('.text-center > .btn').click();

    cy.get('.navbar-nav > :nth-child(2) > .btn').click();
    cy.get(':nth-child(2) > .dropdown-menu > :nth-child(2) > .dropdown-item').click();
  });

  Cypress.Commands.add('AccessEditMeeting', (email, pw) => {
    cy.visit('/');
    cy.get('#email').type(email);
    cy.get('#password').type(pw);
    cy.get('.text-center > .btn').click();

    cy.get('.navbar-nav > :nth-child(2) > .btn').click();
    cy.get(':nth-child(2) > .dropdown-menu > :nth-child(1) > .dropdown-item').click();
  });

  Cypress.Commands.add('TestPreparations', () =>{
    cy.AccessCreateNewMeeting('scrummaster@justacompany.com', 'password');

    //Preparation
    cy.get('#meetingName').type('Cypress Testing');

    cy.get('#startTime').type('2023-05-01T19:00');

    cy.get('#endTime').type('2023-05-01T19:30');

    cy.get('#description').type(`Cypress Testing at: ${new Date()}`);

    cy.get('.d-flex > .btn-success').click();

    cy.get('.bg-success')
        .should('be.visible')
        .and('contain', 'Meeting has been created!');

    cy.get(':nth-child(2) > .btn').click();
    cy.get(':nth-child(2) > .dropdown-menu > :nth-child(1) > .dropdown-item').click();
  });

  it('Check meeting edit process', () => {
    cy.TestPreparations();

    //The real test begin
    cy.get('.btn-info').click();

    cy.get('#meetingName').type(' Edited');

    cy.get('#startTime').type('2023-10-01T19:00');

    cy.get('#endTime').type('2023-10-01T19:30');

    cy.get('#description').clear();
    cy.get('#description').type(`Cypress Testing at new time: ${new Date()}`);

    cy.get('.text-center > .btn-success').click();
  });

  it('Check meeting edit process with incorrectly', () => {
    cy.visit('/');
    cy.AccessEditMeeting('scrummaster@justacompany.com', 'password');

    cy.get('.btn-info').click();

    //missing name
    cy.get('#meetingName').clear();

    cy.get('#startTime').type('2023-10-01T19:00');

    cy.get('#endTime').type('2023-10-01T19:30');

    cy.get('#description').clear();
    cy.get('#description').type(`Cypress Testing at new time: ${new Date()}`);

    cy.get('.text-center > .btn-success').click();

    //invalid dates
    cy.get('#meetingName').type('Cypress Testing Edited');

    cy.get('#startTime').type('2023-10-01T19:00');

    cy.get('#endTime').type('2023-01-01T19:30');

    cy.get('#description').clear();
    cy.get('#description').type(`Cypress Testing at new time: ${new Date()}`);

    cy.get('.text-center > .btn-success').click();

    cy.get('.bg-warning').should(($error) => {
      expect($error).to.contain('Starting date should not be higher than or equal to End date');
    });

    //Deleted
    cy.get('.text-center > .btn-danger').click();
    cy.get('.modal-footer > .btn-danger').click();

  });
})