FROM python:3.9.19-alpine3.19

WORKDIR /app

COPY . .

# COPY requirements.txt .
# RUN pip install --no-cache-dir -r requirements.txt

RUN pip3 install flask gunicorn

EXPOSE 80

CMD ["gunicorn", "--bind", "0.0.0.0:80", "app:app"]
# CMD ["python3", "app.py"]
