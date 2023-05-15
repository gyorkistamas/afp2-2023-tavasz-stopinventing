describe('edit profile', () => {
    before(() => {
        cy.refreshDatabase();
        cy.seed();
    });

    beforeEach(() => {
        cy.visit('/');
        cy.get('#email').type('adminuser@justacompany.com');
        cy.get('#password').type('password');
        cy.get('.text-center > .btn').click();
        cy.get(':nth-child(5) > .btn').click();
        cy.get(':nth-child(5) > .dropdown-menu > :nth-child(1) > .dropdown-item').click();
    });

    it ('changes the name to Cypress', () => {
        cy.get('#fullName').type('Cypress');
        cy.get('.text-center > .btn').click();
        cy.contains('Cypress');
    });

    it ('changes the email to testmail@test.com', () => {
        cy.get('#email').clear();
        cy.get('#email').type('testmail@test.com');
        cy.get('.text-center > .btn').click();
        cy.get('#email').should('have.value', 'testmail@test.com');
        cy.get('#email').clear();
        cy.get('#email').type('adminuser@justacompany.com');
        cy.get('.text-center > .btn').click();
    });

    it ('changes the password to 123456789', () => {
        cy.get('#password').type('123456789');
        cy.get('#password_confirmation').type('123456789');
        cy.get('.text-center > .btn').click();
        cy.get(':nth-child(5) > .btn').click();
        cy.get(':nth-child(5) > .dropdown-menu > :nth-child(2) > .dropdown-item').click();
        cy.get('#email').type('adminuser@justacompany.com');
        cy.get('#password').type('123456789');
        cy.get('.text-center > .btn').click();
        cy.visit('/my-meetings');
        cy.contains('My invites');
    });

});
