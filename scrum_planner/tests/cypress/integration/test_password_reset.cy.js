describe('Testing password reset feature', () => {

    before(() => {
        cy.refreshDatabase();
        cy.seed();
    });

    it('checks change password feature for Scrum Master as admin', () => {
        cy.visit('/');
        cy.get('#email').type('adminuser@justacompany.com');
        cy.get('#password').type('password');

        cy.get('.text-center > .btn').click();

        cy.get('.navbar-nav > :nth-child(4) > .btn').click();

        cy.get('[onclick="GenerateRndPasswd(2)"]').click();

        cy.get('#newPwd2').then(($newPassword) =>{

            const retrievedPassword = $newPassword.val();

            // cy.log(retrievedPassword);

            cy.get('[action="/users/changepasswd/2"] > .btn').click();

            cy.get('.navbar-nav > :nth-child(5) > .btn').click();

            cy.get(':nth-child(5) > .dropdown-menu > :nth-child(2) > .dropdown-item').click();

            cy.get('#email').type('scrummaster@justacompany.com');

            cy.log(`${retrievedPassword}`);

            cy.get('#password').type(`${retrievedPassword}`);

            cy.get('.text-center > .btn').click();

            cy.get('.navbar-nav > :nth-child(4) > .btn').invoke('text').should('include', 'Scrum Master');

        });

    })
})
