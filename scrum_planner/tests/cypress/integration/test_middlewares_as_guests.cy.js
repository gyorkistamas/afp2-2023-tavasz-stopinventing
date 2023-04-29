describe('middleware test for guests', () => {
    before(() => {
        cy.refreshDatabase();
        cy.seed();
    });

    it('visits the sign in page', () => {
        cy.visit('/sign-in');
        cy.contains('Sign In')
    });

    it('visits the sign up page', () => {
        cy.visit('/sign-up');
        cy.contains('Sign Up')
    });

    it('visits the forgotten password page', () => {
        cy.visit('/request-password');
        cy.contains('Please, contact the Administrator!')
    });

    it('visits the sign out page', () => {
        cy.visit('/sign-out');
        cy.contains('Sign In')
    });

    it('visits the users page', () => {
        cy.visit('/users');
        cy.contains('Sign In')
    });

    it('visits the status change page', () => {
        cy.visit('/users/change-status/1');
        cy.contains('Sign In')
    });

    it('visits the team creation page', () => {
        cy.visit('/team/create');
        cy.contains('Sign In')
    });

    it('visits the manage teams page', () => {
        cy.visit('/manage-teams');
        cy.contains('Sign In')
    });

    it('visits the edit team page', () => {
        cy.visit('/team/edit/1');
        cy.contains('Sign In')
    });

    it('visits the delete team page', () => {
        cy.visit('/team/delete/1');
        cy.contains('Sign In')
    });

    it('visits the edit profile page', () => {
        cy.visit('/edit-profile');
        cy.contains('Sign In')
    });

    it('visits the meeting creation page', () => {
        cy.visit('/meeting/create');
        cy.contains('Sign In')
    });

    it('visits the meeting edit page', () => {
        cy.visit('/meeting/edit/1');
        cy.contains('Sign In')
    });

    it('visits the meeting delete page', () => {
        cy.visit('/meeting/delete/1');
        cy.contains('Sign In')
    });

    it('visits a show meeting page', () => {
        cy.visit('/meeting/show/1');
        cy.contains('Sign In')
    });

    it('visits the my meetings page', () => {
        cy.visit('/my-meetings');
        cy.contains('Sign In')
    });

    it('visits the my invites page', () => {
        cy.visit('/my-invites');
        cy.contains('Sign In')
    });

    it('visits the manage meetings page', () => {
        cy.visit('/manage-meetings');
        cy.contains('Sign In')
    });

})
