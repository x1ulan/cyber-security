from flask import Flask
from flask import request
from flask import redirect, url_for
from flask import render_template
from flask import render_template_string

app = Flask(__name__)

@app.route('/',methods=['GET','POST'])
def home():
    if request.method == 'POST':
        return redirect(url_for('hello', name=request.form['name']))
    return render_template("login.html")

@app.route('/hi/<name>')
def hi(name):
    return f"Hi, {name}!"

@app.route('/hello/@<name>')
def hello(name):
    return render_template_string(f"hello {name}")

if __name__ == '__main__':
    app.run(port=8891)