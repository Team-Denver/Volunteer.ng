# Volunteer.ng
Team Denver's project for Start.ng

## FRONT-END
This section defines the guidelines and methodologies to used for the front-end of this project. 
This applies to all HTML, CSS, and JavaScript code.

### CSS - Introducing BEM.
CSS is great, but it can get messy and difficult to maintain styles as the css file grows larger. 
It is therefore necessary for the team to adhere to strict guidelines when work on our stylesheets
to keep the code clean and maintainable.
**Golden Rule:** Do not use abbreviations when naming elements. This introduces confusion as other team members may struggle to figure out what it represents. For example, use "button" instead of "btn". It may be longer to type, but it makes your code more readable and saves the team headache. Be very generous with comments.

#### Do Not Use Inline Styles. Ever.
Inline styles have just about the highest specificity an so cannot be overriden from with the stylesheet. They also make debugging style conflicts more difficult. Inline styles do not lend themselves to the DRY principle.

#### Modularity
The complexity of a stylesheet is directly proportional to the length of the file. 
It is therefore necessary to break to styles into smaller files. the following rules apply when creating stylesheets
for this project.

##### A separate stylesheet for each page.

##### A separate stylesheet for each reusable component.
An example of a reusable component is the footer section which is present on every page. This 
also includes components whose contents might change but need to appear consistently throughout the web app,
Examples include buttons and headings. All instances these elements share the same styles.
Styles for this section should not be repeated in each page's stylesheet, rather a separate stylesheet should be 
created for such sections and added to every page that needs it using the @import CSS rule.

#### Selectors - The BEM Methodology
The guidelines in this section are based heavily on the popular CSS methodology called BEM.
BEM stands for Block, Element, Modifier and describes a standard for consistently naming CSS selectors that makes
both HTML and CSS easier to read, understand, and hence to maintain.

##### Rule 1 - Stick to class selectors
Only use class for selectors. Avoid using id or decendant selectors. This helps prevent problems relating to specifity.

##### Rule 2 - Each section of a page defines a new block.
Example
.landing-section {
  *your styles here*
}

##### Rule 3 - Mark UI elements with double underscore
Identify each UI element within a block with the double underscore BEM naming convention.
Example
.landing-section__action-button {
  *your styles here*
}

Some elements may also constitute their own block. This is common with reusable components.
In this case we separate composition from layout with two classes. One for the element, and one for the block it renders.
For example, a button which contains an icon may be defined as follows...
<button class="button is-with-icon login-form__button">
  <img src="debit-card.png" class="button__icon">
  Donate Now
</button>

Here the block class is *.button*, which defines the structure (composition) of the button such as its color, box-shadow etc. Should be defined in the button component CSS file.
The element class is *.login-form__button which defines the position (layout) of the button within its parent block. Should be defined in the current page's CSS file or that of its parent component if used with a larger reusable component.
And lastly, *.is-with-icon* is a state class (modifier) which specifies additional styles that only applies to buttons that contain icons. This must be defined in the button component CSS file.

##### Rule 4 - Define modifiers with additional CSS classes.
Modifiers define additional styles for different states of a UI element.
A button for example might have a disabled state when it is unclickable, perhaps because the user needs to enter
some information before submitting a form.
We divert a bit from the BEM recommendation here by thinking in terms of *state* rather than *modifier*. 
Element states should be defined using additional CSS classes prefixed with *'is-'*

For example, the element
<button class="login-form__button is-disabled"></button>
should have default styles defined as 
.login-form__button {
  *your styles here*
}
Additional styles to be applied when it is disabled will then be defined as
.login-form__button.is-disabled {
  *your styles here*
}

The use of state classes in place of the BEM double dash modifier convention is to allow easy toggling of these
states from JavaScript using the HTMLElement.classList.add('is.disabled') method. This also offers a higher specifity which assures that the state changes will override the default styles.

##### Rule 5 - Decendant selectors - A special case.
Sometimes, it may be necessary to change an elements styles based on the state of it's parent *block*.
In this case, the decendant selector is used. Avoid using the direct child selector.
Example
We might want to highlight the action button on a card when the user clicks on the card.
.card.is-focused .card__button {
  background-color: var(--accent-color);
}
This also offers a higher specificity which ensures that the state changes will override the defaults.

#### Themes and Color Schemes With CSS Variables (Custom Properties)
A separate CSS file, vars.css will define color and other theming values. This file must be imported by all other CSS files to use the predefined themes when styling elements. This makes it easier manage color values and themes from a central. **Implementation is ongoing**.

### HTML
**Golden Rule:** Do not use abbreviations when naming elements. This introduces confusion as other team members may struggle to figure out what it represents. For example, use "button" instead of "btn". Be very generous with comments.

#### Semantics Please.
HTML5 introduced semantic tags that such as <section> and <footer> which implicitly convey meaning about their
purpose on the page. These tags improve accesibility by making it easier for scren readers to interprete 
the information on a page for visually impaired users.
Where relevant, use these tags instead of the generic containers.

##### Rule 1 - Headings
All headings should be marked with relevant tags from h1 to h6 depending to the page heirachy.

##### Rule 2 - Button vs. Anchor Link
The anchor tag in HTML has a specific function - linking a user to another page. Buttons on the other hand are used to provide additional functionality to the user. Therefore, if a button takes the user to a new page, only then must the anchor tag be used. In all other cases, the button tag must be used.

##### Rule 3 - Logical sections
<header>, <section>, <aside>, <footer>. These are semantic HTML5 tags used to mark separate sections of a page. Do NOT use the generic <div> tag where any of these would be more appropriate.

### JavaScript
**Golden Rule:** Do not use abbreviations when naming elements. This introduces confusion as other team members may struggle to figure out what it represents. For example, use "let navButton" instead of "let navBtn". It may be longer to type, but it makes your code more readable and saves the team headache. Be very generous with comments.

Write clean code. Make things modular. Keep external libraries to minimum to avoid making the app bloated.
Further guidelines to be included as the project progresses.