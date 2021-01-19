#!/usr/bin/python3

# Script by Jonathan Madon for the Quizlish Project

import yaml

testfile = open('test', 'r')
test = yaml.load(testfile)

# Read the page data from the test YAML and create the CSS, more or less
bodycss = 'body { '
print('<style \>')
try:
    image = test['page']['background-img']
except:
    bodycss += ''
else:
    bodycss += 'background-image: url("img/{}.png"); '.format(image)

try:
    bgcolor = test['page']['background-color']
except:
    bodycss += 'background-color: black; '
else:
    bodycss += 'background-color: {}; '.format(bgcolor)

bodycss += '}'

boxcss = 'div { '
boxcss += 'width: 90%; padding: 25px; margin: 25px; '
try:
    boximage = test['box']['background-img']
except:
    boxcss += ''
else:
    boxcss += 'background-image: url("img/{}.png"); '.format(boximage)

try:
    boxcolor = test['box']['background-color']
except:
    boxcss += 'background-color: white; '
else:
    boxcss += 'background-color: {}; '.format(boxcolor)

try:
    boxtextcolor = test['box']['text-color']
except:
    boxcss += 'color: black; '
else:
    boxcss += 'color: {}; '.format(boxtextcolor)

print(bodycss)
print(boxcss)

print('</style \>')


# Start the form and get the quiz taker's name
print('<body \>')
print('<div \><p \>')
print('<form action="handler.php" method="post" \>')
print('Please enter your name: <input type="text" name="name" \><br \>')

# Then go through each question in the YAML
for num in test['questions']:
    # Get basic info like the question itself, and what type of question.
    question = test['questions'][num]['question']
    qtype = test['questions'][num]['type']
    print("<br \>")
    print("Question {}: {}<br \><br \>".format(num, question))

    # Handle Multiple Choice with single answer
    if qtype == "multi-choice":
        for each in range(0, len(test['questions'][num]['answers'])):
            answer = test['questions'][num]['answers'][each]
            print('<input type="radio" name="answer{}" value="{}" \> {}<br \>'.format(num, answer, answer))

    # Handle Multiple Choice with many possible answers
    if qtype == "multi-answer":
        count = 1
        for each in range(0, len(test['questions'][num]['answers'])):
            answer = test['questions'][num]['answers'][each]
            print('<input type="checkbox" name="answer{}-{}" value="{}" \> {}<br \>'.format(num, count, answer, answer))
            count += 1

    # Handle questions that require a date for an answer
    if qtype == "date":
        print('<input type="date" name="answer{}" \><br \>'.format(num))

    # Handle questions that require a number for an answer, with optional min and max.
    if qtype == "number":
        html = '<input type="number" name="answer{}"'.format(num)
        try:
            min = test['questions'][num]['min']
        except KeyError:
            pass
        else:
            html += ' min="{}"'.format(min)
        try:
            max = test['questions'][num]['max']
        except KeyError:
            pass
        else:
            html += ' max="{}"'.format(max)
        html += ' \><br \>'
        print(html)

    # Handle short answer questions.
    if qtype == "short-answer":
        print('<input type="text" name="answer{}" \><br \>'.format(num))

    # Handle long answer questions.
    if qtype == "long-answer":
        html = ''
        html = '<textarea name="answer{}"'.format(num)
        try:
            rows = test['questions'][num]['rows']
        except KeyError:
            pass
        else:
            html += ' rows="{}"'.format(rows)
        try:
            cols = test['questions'][num]['cols']
        except KeyError:
            pass
        else:
            html += ' cols="{}"'.format(max)
        html += '\></textarea \><br \>'
        print(html)

# Finally, output the submit button.
print('<br \><input type="submit" value="Submit Answers"\></p \></div \></body \>')
