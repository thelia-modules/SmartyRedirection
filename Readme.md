# Smarty Redirection

This module adds a smarty function to redirect the user directly from a template

## Installation

### Manually

* Copy the module into ```<thelia_root>/local/modules/``` directory and be sure that the name of the module is SmartyRedirection.
* Activate it in your thelia administration panel

### Composer

Add it in your main thelia composer.json file

```
composer require thelia/smarty-redirection-module ~1.0.0
```

## Usage

You can use the ```{redirect }``` function like ```{url }```.
Only one parameter is specific to this function: ```status```.

If this parameter isn't given, its value is 302. Otherwise, you can set it to 301 to define a permanent redirection in a template.

## Example

```smarty
{if ! $foo}
    {redirect path="/anywhere"}
{/if}
```

```smarty
{if ! $foo}
    {redirect path="/anywhere" status=301}
{/if}
```
