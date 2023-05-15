describe('Test create new meeting as admin', () => {
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

    it('checks meeting creation process with incorrect input datas as admin', () => {

        cy.AccessCreateNewMeeting('adminuser@justacompany.com', 'password');

        cy.get('.d-flex > .btn-success').click();

        cy.get('#meetingName').then(($input) => {
            expect($input[0].validationMessage).to.eq('Töltse ki ezt a mezőt.')
        });
    });


    it('checks meeting creation process with filled title, startTime, endTime, description input fields as admin', () => {

        cy.AccessCreateNewMeeting('adminuser@justacompany.com', 'password');

        cy.get('#meetingName').type('Cypress Testing');

        cy.get('#startTime').type('2023-05-01T19:00');

        cy.get('#endTime').type('2023-05-01T19:30');

        cy.get('#description').type(`Cypress Testing at: ${new Date()}`);

        cy.get('.d-flex > .btn-success').click();

        cy.get('.bg-success')
            .should('be.visible')
            .and('contain', 'Meeting has been created!');

    });

    it('checks whether meeting creation process fails if given title is less than 3 character as admin', () => {

        cy.AccessCreateNewMeeting('adminuser@justacompany.com', 'password');

        cy.get('#meetingName').type('F');

        cy.get('#startTime').type('2023-05-01T19:00');

        cy.get('#endTime').type('2023-05-01T19:30');

        cy.get('#description').type(`Cypress Testing at: ${new Date()}`);

        cy.get('.d-flex > .btn-success').click();

        cy.get('.text-warning').should(($error) => {
            expect($error).to.contain('The name field must be at least 3 characters.');
        });

    });

    it('checks whether meeting creation process fails if endTime is less than startTime as admin', () => {

        cy.AccessCreateNewMeeting('adminuser@justacompany.com', 'password');

        cy.get('#meetingName').type('Cypress Testing');

        cy.get('#startTime').type('2023-05-01T21:00');

        cy.get('#endTime').type('2023-05-01T06:30');

        cy.get('#description').type(`Cypress Testing at: ${new Date()}`);

        cy.get('.d-flex > .btn-success').click();

        cy.get('.bg-warning')
            .should('be.visible')
            .and('contain', 'Starting date should not be higher than or equal to End date');

    });

    it('checks whether meeting creation process fails if endTime is equal to startTime as admin', () => {

        cy.AccessCreateNewMeeting('adminuser@justacompany.com', 'password');

        cy.get('#meetingName').type('Cypress Testing');

        cy.get('#startTime').type('2023-05-01T20:00');

        cy.get('#endTime').type('2023-05-01T20:00');

        cy.get('#description').type(`Cypress Testing at: ${new Date()}`);

        cy.get('.d-flex > .btn-success').click();

        cy.get('.bg-warning')
            .should('be.visible')
            .and('contain', 'Starting date should not be higher than or equal to End date');

    });

});
