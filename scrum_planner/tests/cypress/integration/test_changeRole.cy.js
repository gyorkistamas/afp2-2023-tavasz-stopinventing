describe('Testing rolechange', () => {

    before(() => {
        cy.refreshDatabase();
        cy.seed();
    });

    it('checks change role feature for Simple User as admin', () => {
        cy.visit('/');
        cy.get('#email').type('adminuser@justacompany.com');
        cy.get('#password').type('password');

        cy.get('.text-center > .btn').click();

        cy.get('.navbar-nav > :nth-child(4) > .btn').click();

        cy.get('[onclick="GenerateRndPasswd(3)"]').click();
        cy.get('select').eq(2).select('2');
        cy.get('[action="/users/change-role/3"] > .btn').click();
        cy.get('.navbar-nav > :nth-child(5) > .btn').click();

        cy.get(':nth-child(5) > .dropdown-menu > :nth-child(2) > .dropdown-item').click();
        //logging in with simple user
        cy.get('#email').type('justauser@justacompany.com');
        cy.get('#password').type('password');

        cy.get('.text-center > .btn').click();
    })
})
