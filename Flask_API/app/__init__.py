from flask import Flask
import numpy as np
import pandas as pd

app = Flask(__name__)

compare_portfolios_df = pd.read_csv(".\dataset\\weights_portfolio.csv")

@app.route('/')
def index():
    return {'status': 'Success', 'Message': 'Welcome to the Flask Gold ETF Model Server'}

@app.route('/get_all_portfolios_data')
def get_all_portfolios_data():
    return {'status': 'Success', 'portfolios_data' : compare_portfolios_df.to_json()}

@app.route('/get_min_risk_portfolio_data')
def get_min_risk_portfolio_data():
    min_risk_portfolio = compare_portfolios_df.iloc[compare_portfolios_df['Risk'].idxmin()]
    return {'status': 'Success', 'portfolios_data' : min_risk_portfolio.to_json()}

@app.route('/get_highest_return_portfolios_data')
def get_highest_return_portfolios_data():
    highest_return_portfolio = compare_portfolios_df.iloc[compare_portfolios_df['Return Rate'].idxmax()]
    return {'status': 'Success', 'portfolios_data' : highest_return_portfolio.to_json()}

if __name__ == "__init__":
    app.run()