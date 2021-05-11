# project/server/config.py

import os

basedir = os.path.abspath(os.path.dirname(__file__))


class BaseConfig(object):
    """Base configuration."""

    WTF_CSRF_ENABLED = True
    TRAINING_FROM_SCRATCH = False
    SAVE_AFTER_N_EPOCHS = 9
    TFIDF_THRESHOLD = 0.95

class DevelopmentConfig(BaseConfig):
    """Development configuration."""

    WTF_CSRF_ENABLED = False


class TestingConfig(BaseConfig):
    """Testing configuration."""

    TESTING = True
    WTF_CSRF_ENABLED = False
    PRESERVE_CONTEXT_ON_EXCEPTION = False
