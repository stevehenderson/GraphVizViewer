#GraphVizViewer

The GraphVizViewer is a simple application server that allows for the quick posting and rendering of graphviz dot files.

The viewer displays a a gallery of previously submitted dot files.  A user can then pan and zoom on rendered files, edit the files, and rerender.

The user can also post a new dot file using a form.

#Installation

Ensure dot is installed on your system and in the system path.  Test it with the following syntax

```
dot test.dot -Tsvg -o test.svg
```

Donwload this git repository

Add the following subdirectories and ensure they are writable by the web server:

images/

thumbs/

markup/


#Requirements

The GraphVizViewer uses the jQuery Panzoom from (https://github.com/timmywil/jquery.panzoom#faq).
