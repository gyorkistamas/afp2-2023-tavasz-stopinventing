describe('Testing suspend user feature', () => {

    before(() => {
        cy.refreshDatabase();
        cy.seed();
    });

    it('change isSuspend for Scrum Master as admin', () => {
        cy.visit('/');
        cy.get('#email').type('adminuser@justacompany.com');
        cy.get('#password').type('password');

        cy.get('.text-center > .btn').click();

        cy.get('.navbar-nav > :nth-child(4) > .btn').click();

        cy.get('a[href="/users/change-status/2"]').click();
    });
    it('try to login as Scrum master after being suspended',()=>{
        cy.visit('/');
        cy.get('#email').type('scrummaster@justacompany.com');
        cy.get('#password').type('password');

        cy.get('.text-center > .btn').click();
    });
})
