# PiPin

A tool for managing the GPIO pins on a Raspberry Pi.

## Usage

```apache
# Export/Unexport a pin
pipin export   [pin]
pipin unexport [pin]

# Reading a pin state
pipin value     [pin]
pipin direction [pin]
pipin edge      [pin]

# Changing a pin state
pipin value     [pin] [0|1]
pipin direction [pin] [in|out]
pipin edge      [pin] [none|both|falling|rising]
```

## How To Install

Make sure you have [composer](https://getcomposer.org/) installed.

```sh
composer global require andrewcarteruk/cryptokey
```

Make sure you have added your global composer binary directory to the PATH in your `~/.bash_profile` (or `~/.bashrc`) file:

```sh
export PATH=~/.composer/vendor/bin:$PATH
```

[This blog](https://akrabat.com/global-installation-of-php-tools-with-composer/) explains the process of global composer installs in more detail.
