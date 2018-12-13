import sys
import json
import re

from google.cloud import automl_v1beta1
from google.cloud.automl_v1beta1.proto import service_pb2


def get_prediction(content, project_id, model_id):
  prediction_client = automl_v1beta1.PredictionServiceClient()

  name = 'projects/{}/locations/us-central1/models/{}'.format(project_id, model_id)
  payload = {'image': {'image_bytes': content }}
  params = {}
  request = prediction_client.predict(name, payload, params)
  return request  # waits till request is returned

if __name__ == '__main__':
  file_path = sys.argv[1]
  project_id = 'pesthelper-2018'
  model_id = 'ICN8170782427483467765'

  with open(file_path, 'rb') as ff:
    content = ff.read()
  
  output = get_prediction(content, project_id,  model_id)
  output = str(output)
  output = output.replace('payload', '')
  output = output.replace('classification', '')
  output = output.replace('score: ',',')
  output = output.replace('display_name: ',',')
  output = re.sub(r'\s+', '', output)
  output = re.sub('[{"}]','',output)
  output = output.strip(',')
  print(output)
