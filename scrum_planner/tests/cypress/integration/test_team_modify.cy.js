describe('Testing modify team',()=>{
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

    it('creates a team and modifies it',()=>{
        cy.AccessCreateNewMeeting('scrummaster@justacompany.com', 'password');
        //creation part
        cy.get('#meetingName').type('Cypress Testing');

        cy.get('#startTime').type('2023-05-01T19:00');

        cy.get('#endTime').type('2023-05-01T19:30');

        cy.get('#description').type(`Cypress Testing at: ${new Date()}`);

        cy.get('.d-flex > .btn-success').click();

        cy.get('.bg-success')
            .should('be.visible')
            .and('contain', 'Meeting has been created!');
        //modification part

        cy.get('.navbar-nav > :nth-child(2) > .btn').click();
        cy.get(':nth-child(2) > .dropdown-menu > :nth-child(1) > .dropdown-item').click();
        cy.get('.card > .card-body > .btn-info').click();
        cy.get('#meetingName').clear();
        cy.get('#meetingName').type('Cypress');
        cy.get('.text-center > .btn-success').click();
    });
    
    it('creates a team and modifies it but with endTime is less than startTime',()=>{
        cy.refreshDatabase();
        cy.seed();
        cy.AccessCreateNewMeeting('scrummaster@justacompany.com', 'password');
        //creation part
        cy.get('#meetingName').type('Cypress Testing');

        cy.get('#startTime').type('2023-05-01T19:00');

        cy.get('#endTime').type('2023-05-01T19:30');

        cy.get('#description').type(`Cypress Testing at: ${new Date()}`);

        cy.get('.d-flex > .btn-success').click();

        cy.get('.bg-success')
            .should('be.visible')
            .and('contain', 'Meeting has been created!');
        //modification part

        cy.get('.navbar-nav > :nth-child(2) > .btn').click();
        cy.get(':nth-child(2) > .dropdown-menu > :nth-child(1) > .dropdown-item').click();
        cy.get('.card > .card-body > .btn-info').click();
        cy.get('#meetingName').clear();
        cy.get('#meetingName').type('Cypress');
        cy.get('#endTime').clear();
        cy.get('#endTime').type('2023-05-01T18:30');
        cy.get('.text-center > .btn-success').click();
    });
        
}
)