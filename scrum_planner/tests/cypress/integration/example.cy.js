describe('Example Test', () => {
    it('shows a homepage', () => {
        cy.visit('/');
        cy.contains('Sign In');
    });
});
